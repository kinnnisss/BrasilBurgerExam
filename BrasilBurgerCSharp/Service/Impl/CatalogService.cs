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


    public Task<ServiceResult<CatalogueDto>> GetCatalogueAsync(string? filtre, CancellationToken ct = default)
    {
        throw new NotImplementedException();
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
