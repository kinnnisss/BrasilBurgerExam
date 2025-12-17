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
}
