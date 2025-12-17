using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class CatalogRepository : ICatalogRepository
{
    private readonly BrasilBurgerDbContext _db;

    public CatalogRepository(BrasilBurgerDbContext db) => _db = db;

    public async Task<Burger?> GetBurgerByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default)
    {
        var q = _db.Burgers.AsNoTracking().Where(b => b.IdBurger == id);
        if (onlyActive) q = q.Where(b => !b.IsArchived);
        return await q.SingleOrDefaultAsync(ct);
    }

    public async Task<List<Burger>> GetBurgersAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        var q = _db.Burgers.AsNoTracking();
        if (onlyActive) q = q.Where(b => !b.IsArchived);
        return await q.OrderBy(b => b.Nom).ToListAsync(ct);
    }

    public async Task<List<Complement>> GetComplementsAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        var q = _db.Complements.AsNoTracking();
        if (onlyActive) q = q.Where(c => !c.IsArchived);
        return await q.OrderBy(c => c.Nom).ToListAsync(ct);
    }

    public async Task<Menu?> GetMenuDetailsByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default)
    {
        var menuQuery = _db.Menus
            .AsNoTracking()
            .Where(m => m.IdMenu == id);

        if (onlyActive) menuQuery = menuQuery.Where(m => !m.IsArchived);

        var menu = await menuQuery.SingleOrDefaultAsync(ct);
        if (menu is null) return null;
        menu.MenuBurgers = await _db.MenuBurgers
            .AsNoTracking()
            .Where(mb => mb.IdMenu == id)
            .Include(mb => mb.Burger)
            .ToListAsync(ct);
        menu.MenuComplements = await _db.MenuComplements
            .AsNoTracking()
            .Where(mc => mc.IdMenu == id)
            .Include(mc => mc.Complement)
            .ToListAsync(ct);

        return menu;
    }

    public async Task<List<Menu>> GetMenusAsync(bool onlyActive = true, CancellationToken ct = default)
    {
        var q = _db.Menus.AsNoTracking();
        if (onlyActive) q = q.Where(m => !m.IsArchived);
        return await q.OrderBy(m => m.Nom).ToListAsync(ct);
    }

    public async Task<Complement?> GetComplementByIdAsync(int id, bool onlyActive = true, CancellationToken ct = default)
{
    var q = _db.Complements.AsNoTracking().Where(c => c.IdComplement == id);
    if (onlyActive) q = q.Where(c => !c.IsArchived);
    return await q.SingleOrDefaultAsync(ct);
}
}