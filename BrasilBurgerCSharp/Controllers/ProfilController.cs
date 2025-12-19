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



    private static string GetInitials(string prenom, string nom)
    {
        char p = !string.IsNullOrWhiteSpace(prenom) ? char.ToUpperInvariant(prenom.Trim()[0]) : 'B';
        char n = !string.IsNullOrWhiteSpace(nom) ? char.ToUpperInvariant(nom.Trim()[0]) : 'B';
        return $"{p}{n}";
    }
}
