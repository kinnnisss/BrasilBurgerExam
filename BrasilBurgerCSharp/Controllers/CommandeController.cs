using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Core;                 // SessionExtensions + ClientSession
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.ViewModels.Commande;
using BrasilBurgerCSharp.ViewModels.Catalogue;

namespace BrasilBurgerCSharp.Controllers;

public sealed class CommandeController : Controller
{
    private readonly ICatalogService _catalog;
    private readonly ICommandeService _commandeService;
    private readonly ILivraisonRepository _livraisonRepo;

    public CommandeController(
        ICatalogService catalog,
        ICommandeService commandeService,
        ILivraisonRepository livraisonRepo)
    {
        _catalog = catalog;
        _commandeService = commandeService;
        _livraisonRepo = livraisonRepo;
    }
    [HttpGet]
    public async Task<IActionResult> Panier(string? type = null, int? zoneId = null, int? quartierId = null, CancellationToken ct = default)
    {
        var panier = ClientSession.GetPanier(HttpContext);

        var vm = new CheckoutVm
        {
            Panier = panier,
            TypeConsommation = string.IsNullOrWhiteSpace(type) ? "SUR_PLACE" : type!,
            ZoneId = zoneId,
            QuartierId = quartierId
        };

        await LoadZonesQuartiersAsync(vm, ct);

        if (!vm.TypeConsommation.Equals("LIVRAISON", StringComparison.OrdinalIgnoreCase))
        {
            vm.ZoneId = null;
            vm.QuartierId = null;
            vm.Quartiers = new();
        }

        return View(vm);
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

    [HttpPost]
    [ValidateAntiForgeryToken]
    public IActionResult UpdateQuantity(string typeArticle, int articleId, int quantite)
    {
        var panier = ClientSession.GetPanier(HttpContext);

        var item = panier.Items.FirstOrDefault(i =>
            i.ArticleId == articleId &&
            string.Equals(i.TypeArticle, typeArticle, StringComparison.OrdinalIgnoreCase));

        if (item is null) return RedirectToAction(nameof(Panier));

        if (quantite <= 0)
        {
            panier.Items.Remove(item);
        }
        else
        {
            item.Quantite = quantite;
            item.PrixTotal = item.PrixUnitaire * item.Quantite;
        }

        Recalc(panier);
        ClientSession.SavePanier(HttpContext, panier);

        return RedirectToAction(nameof(Panier));
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public IActionResult Remove(string typeArticle, int articleId)
    {
        var panier = ClientSession.GetPanier(HttpContext);

        panier.Items.RemoveAll(i =>
            i.ArticleId == articleId &&
            string.Equals(i.TypeArticle, typeArticle, StringComparison.OrdinalIgnoreCase));

        Recalc(panier);
        ClientSession.SavePanier(HttpContext, panier);

        return RedirectToAction(nameof(Panier));
    }

    [HttpPost]
    [ValidateAntiForgeryToken]
    public IActionResult Clear()
    {
        ClientSession.ClearPanier(HttpContext);
        return RedirectToAction(nameof(Panier));
    }

    private async Task LoadZonesQuartiersAsync(CheckoutVm vm, CancellationToken ct)
    {
        var zones = await _livraisonRepo.GetZonesAsync(ct);
        vm.Zones = zones.Select(z => new ZoneOptionVm
        {
            Id = z.IdZone,
            Libelle = z.Libelle,
            PrixLivraison = z.PrixLivraison
        }).ToList();

        vm.Quartiers = new();

        if (vm.ZoneId is not null)
        {
            var quartiers = await _livraisonRepo.GetQuartiersByZoneAsync(vm.ZoneId.Value, ct);
            vm.Quartiers = quartiers.Select(q => new QuartierOptionVm
            {
                Id = q.IdQuartier,
                Libelle = q.Libelle
            }).ToList();

            if (vm.QuartierId is not null && !vm.Quartiers.Any(x => x.Id == vm.QuartierId.Value))
            {
                vm.QuartierId = null;
            }
        }
    }
    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Confirmer(CheckoutVm model, CancellationToken ct = default)
    {
        var panier = ClientSession.GetPanier(HttpContext);
        model.Panier = panier;

        if (panier.Items.Count == 0)
        {
            model.ErrorMessage = "Votre panier est vide.";
            await LoadZonesQuartiersAsync(model, ct);
            return View("Panier", model);
        }

        var clientId = ClientSession.GetClientId(HttpContext);
        if (clientId is null)
        {
            var returnUrl = Url.Action(nameof(Panier), "Commande", new
            {
                type = model.TypeConsommation,
                zoneId = model.ZoneId,
                quartierId = model.QuartierId
            });

            return RedirectToAction("Login", "Auth", new { returnUrl });
        }

        if (model.TypeConsommation.Equals("LIVRAISON", StringComparison.OrdinalIgnoreCase))
        {
            if (model.ZoneId is null || model.QuartierId is null)
            {
                model.ErrorMessage = "Zone et quartier obligatoires pour une livraison.";
                await LoadZonesQuartiersAsync(model, ct);
                return View("Panier", model);
            }
        }
        else
        {
            model.ZoneId = null;
            model.QuartierId = null;
        }

        var lignes = panier.Items.Select(i => new LigneCommandeCreateDto(
            TypeArticle: i.TypeArticle,
            ArticleId: i.ArticleId,
            Quantite: i.Quantite
        )).ToList();

        var dto = new CommandeCreateDto(
            ClientId: clientId.Value,
            Lignes: lignes,
            TypeConsommation: model.TypeConsommation,
            ZoneId: model.ZoneId,
            QuartierId: model.QuartierId
        );

        var res = await _commandeService.CreerCommandeAsync(dto, ct);
        if (!res.Success || res.Data is null)
        {
            model.ErrorMessage = res.Message ?? "Impossible de confirmer la commande.";
            await LoadZonesQuartiersAsync(model, ct);
            return View("Panier", model);
        }

        ClientSession.ClearPanier(HttpContext);

        return RedirectToAction("Index", "Paiement", new { commandeId = res.Data.Id });
    }
}
