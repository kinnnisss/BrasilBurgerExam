using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Repository;
using BrasilBurgerCSharp.Service.Common;

namespace BrasilBurgerCSharp.Service.Impl;

public sealed class CatalogService : ICatalogService
{
    private readonly ICatalogRepository _catalogRepo;

    public CatalogService(ICatalogRepository catalogRepo) => _catalogRepo = catalogRepo;

    public async Task<ServiceResult<BurgerDto>> GetBurgerAsync(int id, CancellationToken ct = default)
    {
        var b = await _catalogRepo.GetBurgerByIdAsync(id, true, ct);
        if (b is null) return ServiceResult<BurgerDto>.Fail(ServiceError.NotFound, "Burger introuvable.");

        return ServiceResult<BurgerDto>.Ok(new BurgerDto(b.IdBurger, b.Nom, b.Prix, b.Image));
    }


    public async Task<ServiceResult<CatalogueDto>> GetCatalogueAsync(string? filtre, CancellationToken ct = default)
    {
        filtre = (filtre ?? "").Trim().ToUpperInvariant();

        var burgersTask = _catalogRepo.GetBurgersAsync(true, ct);
        var menusTask = _catalogRepo.GetMenusAsync(true, ct);

        await Task.WhenAll(burgersTask, menusTask);

        var burgers = (await burgersTask)
            .Select(b => new BurgerDto(b.IdBurger, b.Nom, b.Prix, b.Image))
            .ToList();

        var menus = (await menusTask)
            .Select(m => new MenuDto(m.IdMenu, m.Nom, m.Prix, m.Image))
            .ToList();

        if (filtre == "BURGER") return ServiceResult<CatalogueDto>.Ok(new CatalogueDto(burgers, new List<MenuDto>()));
        if (filtre == "MENU")   return ServiceResult<CatalogueDto>.Ok(new CatalogueDto(new List<BurgerDto>(), menus));

        return ServiceResult<CatalogueDto>.Ok(new CatalogueDto(burgers, menus));
    }
    public Task<ServiceResult<List<ComplementDto>>> GetComplementsAsync(CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<ServiceResult<MenuDetailsDto>> GetMenuDetailsAsync(int id, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}
