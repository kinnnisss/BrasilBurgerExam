using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.Service.Common;

namespace BrasilBurgerCSharp.Service;

public interface ICatalogService
{
    Task<ServiceResult<CatalogueDto>> GetCatalogueAsync(string? filtre, CancellationToken ct = default);
    Task<ServiceResult<BurgerDto>> GetBurgerAsync(int id, CancellationToken ct = default);
    Task<ServiceResult<MenuDetailsDto>> GetMenuDetailsAsync(int id, CancellationToken ct = default);
    Task<ServiceResult<List<ComplementDto>>> GetComplementsAsync(CancellationToken ct = default);
}
