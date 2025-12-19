using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Core;
using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.ViewModels.Commande;

namespace BrasilBurgerCSharp.Controllers;

public sealed class PaiementController : Controller
{
    private readonly ICommandeService _commandeService;
    private readonly IPaiementService _paiementService;

    public PaiementController(ICommandeService commandeService, IPaiementService paiementService)
    {
        _commandeService = commandeService;
        _paiementService = paiementService;
    }

[HttpGet]
public async Task<IActionResult> Index(int commandeId, CancellationToken ct = default)
{
    var clientId = ClientSession.GetClientId(HttpContext);
    if (clientId is null)
        return RedirectToAction("Login", "Auth", new
        {
            returnUrl = Url.Action(nameof(Index), "Paiement", new { commandeId })
        });

    var detailsRes = await _commandeService.GetCommandeDetailsAsync(commandeId, clientId.Value, ct);
    if (!detailsRes.Success || detailsRes.Data is null) return NotFound();

    var cmd = detailsRes.Data.Commande;
    var lignes = detailsRes.Data.Lignes ?? new List<LigneCommandeDto>();

    var sousTotal = lignes.Sum(l => l.PrixTotal);
    var type = (cmd.TypeConsommation ?? "").Trim().ToUpperInvariant();

    var fraisLivraison = (type == "LIVRAISON")
        ? Math.Max(0m, cmd.MontantTotal - sousTotal)
        : 0m;

    var vm = new PaymentVm
    {
        CommandeId = cmd.Id,
        Reference = cmd.Reference,
        Montant = cmd.MontantTotal,
        ModePaiement = "WAVE",

        TypeConsommation = type,
        SousTotal = sousTotal,
        FraisLivraison = fraisLivraison,
        Lignes = lignes
    };

    return View(vm);
}

    [HttpGet]
    public async Task<IActionResult> Success(int commandeId, CancellationToken ct = default)
    {
        var clientId = ClientSession.GetClientId(HttpContext);
        if (clientId is null)
            return RedirectToAction("Login", "Auth", new { returnUrl = Url.Action(nameof(Success), "Paiement", new { commandeId }) });

        var detailsRes = await _commandeService.GetCommandeDetailsAsync(commandeId, clientId.Value, ct);
        if (!detailsRes.Success || detailsRes.Data is null) return NotFound();

        return View(detailsRes.Data);
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Payer(PaymentVm model, CancellationToken ct = default)
    {
        var clientId = ClientSession.GetClientId(HttpContext);
        if (clientId is null)
            return RedirectToAction("Login", "Auth", new { returnUrl = Url.Action(nameof(Index), "Paiement", new { commandeId = model.CommandeId }) });

        var res = await _paiementService.PayerAsync(
            clientId.Value,
            new PaiementCreateDto(model.CommandeId, model.ModePaiement),
            ct);

        if (!res.Success || res.Data is null)
        {
            model.ErrorMessage = res.Message ?? "Paiement impossible.";
            return View("Index", model);
        }

        return RedirectToAction(nameof(Success), new { commandeId = model.CommandeId });
    }

}
