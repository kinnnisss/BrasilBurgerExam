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

    private static void AddOrIncrement(
        PanierVm panier,
        string typeArticle,
        int articleId,
        string libelle,
        string? image,
        int quantite,
        decimal prixUnitaire)
    {
        var item = panier.Items.FirstOrDefault(i =>
            i.ArticleId == articleId &&
            string.Equals(i.TypeArticle, typeArticle, StringComparison.OrdinalIgnoreCase));

        if (item is null)
        {
            item = new PanierItemVm
            {
                TypeArticle = typeArticle.ToUpperInvariant(),
                ArticleId = articleId,
                Libelle = libelle,
                Image = image,
                Quantite = quantite,
                PrixUnitaire = prixUnitaire
            };
            panier.Items.Add(item);
        }
        else
        {
            item.Quantite += quantite;
        }

        item.PrixTotal = item.PrixUnitaire * item.Quantite;
        Recalc(panier);
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> AddMenu(int id, int quantite = 1, CancellationToken ct = default)
    {
        if (quantite <= 0) quantite = 1;

        var menuRes = await _catalog.GetMenuDetailsAsync(id, ct);
        if (!menuRes.Success || menuRes.Data is null) return NotFound();

        var panier = ClientSession.GetPanier(HttpContext);

        AddOrIncrement(
            panier,
            typeArticle: "MENU",
            articleId: menuRes.Data.Id,
            libelle: menuRes.Data.Nom,
            image: menuRes.Data.Image,
            quantite: quantite,
            prixUnitaire: menuRes.Data.Prix);

        ClientSession.SavePanier(HttpContext, panier);
        return RedirectToAction(nameof(Panier));
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> AddBurger(
        int id,
        int quantite = 1,
        List<int>? selectedComplementIds = null,
        CancellationToken ct = default)
    {
        if (quantite <= 0) quantite = 1;

        var burgerRes = await _catalog.GetBurgerAsync(id, ct);
        if (!burgerRes.Success || burgerRes.Data is null) return NotFound();

        var panier = ClientSession.GetPanier(HttpContext);

        AddOrIncrement(
            panier,
            typeArticle: "BURGER",
            articleId: burgerRes.Data.Id,
            libelle: burgerRes.Data.Nom,
            image: burgerRes.Data.Image,
            quantite: quantite,
            prixUnitaire: burgerRes.Data.Prix);

        if (selectedComplementIds is { Count: > 0 })
        {
            var compRes = await _catalog.GetComplementsAsync(ct);

            if (compRes.Success && compRes.Data is not null)
            {
                var selected = compRes.Data
                    .Where(c => selectedComplementIds.Contains(c.Id))
                    .ToList();

                foreach (var c in selected)
                {
                    AddOrIncrement(
                        panier,
                        typeArticle: "COMPLEMENT",
                        articleId: c.Id,
                        libelle: c.Nom,
                        image: c.Image,
                        quantite: quantite,
                        prixUnitaire: c.Prix);
                }
            }
        }

        ClientSession.SavePanier(HttpContext, panier);
        return RedirectToAction(nameof(Panier));
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> AddComplement(int id, int quantite = 1, CancellationToken ct = default)
    {
        if (quantite <= 0) quantite = 1;

        var compRes = await _catalog.GetComplementsAsync(ct);
        if (!compRes.Success || compRes.Data is null) return NotFound();

        var comp = compRes.Data.FirstOrDefault(c => c.Id == id);
        if (comp is null) return NotFound();

        var panier = ClientSession.GetPanier(HttpContext);

        AddOrIncrement(
            panier,
            typeArticle: "COMPLEMENT",
            articleId: comp.Id,
            libelle: comp.Nom,
            image: comp.Image,
            quantite: quantite,
            prixUnitaire: comp.Prix);

        ClientSession.SavePanier(HttpContext, panier);
        return RedirectToAction(nameof(Panier));
    }
}
