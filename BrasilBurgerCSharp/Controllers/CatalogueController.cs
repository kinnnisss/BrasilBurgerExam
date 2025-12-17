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
        var res = await _catalog.GetCatalogueAsync(filtre, ct);
        if (!res.Success || res.Data is null) return View(new CatalogueIndexVm());

        var vm = new CatalogueIndexVm
        {
            Filtre = filtre,
            Burgers = res.Data.Burgers.Select(b => new BurgerCardVm
            {
                Id = b.Id, Nom = b.Nom, Prix = b.Prix, Image = b.Image
            }).ToList(),
            Menus = res.Data.Menus.Select(m => new MenuCardVm
            {
                Id = m.Id, Nom = m.Nom, Prix = m.Prix, Image = m.Image
            }).ToList()
        };

        return View(vm);
    }

    [HttpGet]
    public async Task<IActionResult> Burger(int id, CancellationToken ct = default)
    {
        var res = await _catalog.GetBurgerAsync(id, ct);
        if (!res.Success || res.Data is null) return NotFound();

        return View(new BurgerDetailsVm
        {
            Id = res.Data.Id,
            Nom = res.Data.Nom,
            Prix = res.Data.Prix,
            Image = res.Data.Image,
            Quantite = 1
        });
    }


}
