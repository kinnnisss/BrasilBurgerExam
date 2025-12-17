using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Core;                 // SessionExtensions + ClientSession
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.ViewModels.Commande;
using BrasilBurgerCSharp.ViewModels.Catalogue;

namespace BrasilBurgerCSharp.Controllers;

public sealed class CommandeController : Controller
{
    private readonly ICatalogService _catalog;

    public CommandeController(ICatalogService catalog)
    {
        _catalog = catalog;
    }

    [HttpGet]
    public IActionResult Panier()
    {
        var panier = ClientSession.GetPanier(HttpContext);
        return View(panier);
    }

    private static void Recalc(PanierVm panier)
    {
        foreach (var i in panier.Items)
            i.PrixTotal = i.PrixUnitaire * i.Quantite;

        panier.Total = panier.Items.Sum(x => x.PrixTotal);
    }
}
