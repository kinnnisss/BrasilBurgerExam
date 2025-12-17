using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository;

public interface ICatalogRepository
{
    Task<List<Burger>> GetBurgersAsync(bool onlyActive = true, CancellationToken ct = default);
    Task<List<Menu>> GetMenusAsync(bool onlyActive = true, CancellationToken ct = default);
    Task<List<Complement>> GetComplementsAsync(bool onlyActive = true, CancellationToken ct = default);
    Task<Burger?> GetBurgerByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default);
    Task<Menu?> GetMenuDetailsByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default);
}
