using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class CatalogRepository : ICatalogRepository
{
    private readonly BrasilBurgerDbContext _db;

    public CatalogRepository(BrasilBurgerDbContext db) => _db = db;

    public Task<Burger?> GetBurgerByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public async Task<List<Burger>> GetBurgersAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        var q = _db.Burgers.AsNoTracking();
        if (onlyActive) q = q.Where(b => !b.IsArchived);
        return await q.OrderBy(b => b.Nom).ToListAsync(ct);
    }

    public Task<List<Complement>> GetComplementsAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<Menu?> GetMenuDetailsByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<List<Menu>> GetMenusAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}