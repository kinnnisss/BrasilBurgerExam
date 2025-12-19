using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.ViewModels.Catalogue;

namespace BrasilBurgerCSharp.Controllers;

public sealed class CatalogueController : Controller
{
    private readonly ICatalogService _catalog;

    public CatalogueController(ICatalogService catalog) => _catalog = catalog;

    [HttpGet]
    public async Task<IActionResult> Index(string? filtre, CancellationToken ct = default)
    {
        filtre = (filtre ?? "ALL").Trim().ToUpperInvariant();

        if (filtre is not ("ALL" or "BURGER" or "MENU" or "COMPLEMENT"))
            filtre = "ALL";

        var catRes = await _catalog.GetCatalogueAsync(
            filtre is "BURGER" or "MENU" ? filtre : null,
            ct);

        var compRes = (filtre is "ALL" or "COMPLEMENT")
            ? await _catalog.GetComplementsAsync(ct)
            : null;

        var vm = new CatalogueIndexVm
        {
            Filtre = filtre == "ALL" ? null : filtre,
            Burgers = new(),
            Menus = new(),
            Complements = new()
        };

        if (catRes.Success && catRes.Data is not null)
        {
            vm.Burgers = catRes.Data.Burgers.Select(b => new BurgerCardVm
            {
                Id = b.Id,
                Nom = b.Nom,
                Prix = b.Prix,
                Image = b.Image
            }).ToList();

            vm.Menus = catRes.Data.Menus.Select(m => new MenuCardVm
            {
                Id = m.Id,
                Nom = m.Nom,
                Prix = m.Prix,
                Image = m.Image
            }).ToList();
        }

        if (compRes is not null && compRes.Success && compRes.Data is not null)
        {
            vm.Complements = compRes.Data.Select(c => new ComplementVm
            {
                Id = c.Id,
                Nom = c.Nom,
                Prix = c.Prix,
                Image = c.Image,
                TypeComplement = c.TypeComplement
            }).ToList();
        }

        return View(vm);
    }

    [HttpGet]
    public async Task<IActionResult> Burger(int id, CancellationToken ct = default)
    {
        var burgerRes = await _catalog.GetBurgerAsync(id, ct);
        if (!burgerRes.Success || burgerRes.Data is null) return NotFound();

        var compRes = await _catalog.GetComplementsAsync(ct);

        var vm = new BurgerDetailsVm
        {
            Id = burgerRes.Data.Id,
            Nom = burgerRes.Data.Nom,
            Prix = burgerRes.Data.Prix,
            Image = burgerRes.Data.Image,
            Quantite = 1,
            Complements = (compRes.Success && compRes.Data is not null)
                ? compRes.Data.Select(c => new ComplementVm
                {
                    Id = c.Id,
                    Nom = c.Nom,
                    Prix = c.Prix,
                    Image = c.Image,
                    TypeComplement = c.TypeComplement
                }).ToList()
                : new()
        };

        return View(vm);
    }

    [HttpGet]
    public async Task<IActionResult> Menu(int id, CancellationToken ct = default)
    {
        var res = await _catalog.GetMenuDetailsAsync(id, ct);
        if (!res.Success || res.Data is null) return NotFound();

        var vm = new MenuDetailsVm
        {
            Id = res.Data.Id,
            Nom = res.Data.Nom,
            Prix = res.Data.Prix,
            Image = res.Data.Image,
            Quantite = 1,
            Burgers = res.Data.Burgers.Select(b => new BurgerCardVm
            {
                Id = b.Id,
                Nom = b.Nom,
                Prix = b.Prix,
                Image = b.Image
            }).ToList(),
            Complements = res.Data.Complements.Select(c => new ComplementVm
            {
                Id = c.Id,
                Nom = c.Nom,
                Prix = c.Prix,
                Image = c.Image,
                TypeComplement = c.TypeComplement
            }).ToList()
        };

        return View(vm);
    }

[HttpGet]
public async Task<IActionResult> Complement(int id, string? returnUrl = null, CancellationToken ct = default)
{
    var res = await _catalog.GetComplementsAsync(ct);
    if (!res.Success || res.Data is null) return NotFound();

    var c = res.Data.FirstOrDefault(x => x.Id == id);
    if (c is null) return NotFound();

    string backUrl;
    if (!string.IsNullOrWhiteSpace(returnUrl) && Url.IsLocalUrl(returnUrl))
        backUrl = returnUrl!;
    else
        backUrl = Url.Action("Index", "Catalogue") ?? "/";

    ViewBag.MinimalHeader = true;
    ViewData["PageBarTitle"] = "Détails complément";
    ViewData["PageBarBackUrl"] = backUrl;

    var vm = new ComplementVm
    {
        Id = c.Id,
        Nom = c.Nom,
        Prix = c.Prix,
        Image = c.Image,
        TypeComplement = c.TypeComplement
    };

    return View(vm);
}
}
