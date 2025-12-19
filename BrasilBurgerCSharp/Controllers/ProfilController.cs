using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Core;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.ViewModels.Profil;

namespace BrasilBurgerCSharp.Controllers;

public sealed class ProfilController : Controller
{
    private readonly IClientRepository _clientRepo;
    private readonly ICommandeService _commandeService;


    public ProfilController(IClientRepository clientRepo, ICommandeService commandeService)
    {
        _clientRepo = clientRepo;
        _commandeService = commandeService;
    }

    [HttpGet]
    public async Task<IActionResult> Index(CancellationToken ct = default)
    {
        var clientId = ClientSession.GetClientId(HttpContext);
        if (clientId is null)
            return RedirectToAction("Login", "Auth",
                new { returnUrl = Url.Action(nameof(Index), "Profil") });

        var client = await _clientRepo.GetByIdAsync(clientId.Value, ct);
        if (client is null) return NotFound();

        var enCoursRes = await _commandeService.GetCommandesEnCoursAsync(clientId.Value, ct);
        var histRes = await _commandeService.GetHistoriqueAsync(clientId.Value, ct);

        var enCours = (enCoursRes.Success && enCoursRes.Data is not null) ? enCoursRes.Data : new();
        var hist = (histRes.Success && histRes.Data is not null) ? histRes.Data : new();

        var total = hist.Sum(x => x.MontantTotal);

        var nomComplet = $"{client.Prenom} {client.Nom}".Trim();
        var initials = GetInitials(client.Prenom, client.Nom);

        var vm = new ProfilVm
        {
            NomComplet = string.IsNullOrWhiteSpace(nomComplet) ? "Client" : nomComplet,
            Telephone = client.Telephone ?? "",
            Login = client.Login ?? "",
            Initiales = initials,

            NbEnCours = enCours.Count,
            NbCommandes = enCours.Count + hist.Count,
            TotalFcfa = total
        };

        ViewBag.ClientName = vm.NomComplet;

        return View(vm);
    }
    private static string GetInitials(string prenom, string nom)
    {
        char p = !string.IsNullOrWhiteSpace(prenom) ? char.ToUpperInvariant(prenom.Trim()[0]) : 'B';
        char n = !string.IsNullOrWhiteSpace(nom) ? char.ToUpperInvariant(nom.Trim()[0]) : 'B';
        return $"{p}{n}";
    }
}
