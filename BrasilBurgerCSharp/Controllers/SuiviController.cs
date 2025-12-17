using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Core;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.ViewModels.Suivi;

namespace BrasilBurgerCSharp.Controllers;

public sealed class SuiviController : Controller
{
    private readonly ICommandeService _commandeService;

    public SuiviController(ICommandeService commandeService)
        => _commandeService = commandeService;

    private async Task<CommandeRowVm> BuildRowAsync(int clientId, int commandeId, CancellationToken ct, DTOs.CommandeDto fallback)
    {
        var details = await _commandeService.GetCommandeDetailsAsync(commandeId, clientId, ct);

        if (!details.Success || details.Data is null)
        {
            return new CommandeRowVm
            {
                Id = fallback.Id,
                Reference = fallback.Reference,
                DateCommande = fallback.DateCommande,
                Etat = fallback.Etat,
                MontantTotal = fallback.MontantTotal,
                EstPayee = fallback.EstPayee,

                TypeConsommation = fallback.TypeConsommation,
                ResumeArticles = new List<string>()
            };
        }

        var cmd = details.Data.Commande;

        var resume = details.Data.Lignes
            .Select(l => $"{l.Quantite}x {l.LibelleArticle}")
            .ToList();

        return new CommandeRowVm
        {
            Id = cmd.Id,
            Reference = cmd.Reference,
            DateCommande = cmd.DateCommande,
            Etat = cmd.Etat,
            MontantTotal = cmd.MontantTotal,
            EstPayee = cmd.EstPayee,

            TypeConsommation = cmd.TypeConsommation,
            ResumeArticles = resume
        };
    }

    [HttpGet]
    public async Task<IActionResult> Index(CancellationToken ct = default)
    {
        var clientId = ClientSession.GetClientId(HttpContext);
        if (clientId is null)
            return RedirectToAction("Login", "Auth", new { returnUrl = Url.Action(nameof(Index), "Suivi") });

        var res = await _commandeService.GetCommandesEnCoursAsync(clientId.Value, ct);
        if (!res.Success || res.Data is null) return View(new SuiviVm());

        var vm = new SuiviVm();

        foreach (var c in res.Data)
        {
            var row = await BuildRowAsync(clientId.Value, c.Id, ct, fallback: c);
            vm.CommandesEnCours.Add(row);
        }

        return View(vm);
    }

 
}
