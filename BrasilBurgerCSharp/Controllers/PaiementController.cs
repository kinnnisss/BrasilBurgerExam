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
            return RedirectToAction("Login", "Auth", new { returnUrl = Url.Action(nameof(Index), "Paiement", new { commandeId }) });

        var detailsRes = await _commandeService.GetCommandeDetailsAsync(commandeId, clientId.Value, ct);
        if (!detailsRes.Success || detailsRes.Data is null) return NotFound();

        var cmd = detailsRes.Data.Commande;

        var vm = new PaymentVm
        {
            CommandeId = cmd.Id,
            Reference = cmd.Reference,
            Montant = cmd.MontantTotal,
            ModePaiement = "WAVE"
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
