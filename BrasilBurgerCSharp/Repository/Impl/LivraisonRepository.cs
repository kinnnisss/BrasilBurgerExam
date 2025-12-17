using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class LivraisonRepository : ILivraisonRepository
{
    private readonly BrasilBurgerDbContext _db;

    public LivraisonRepository(BrasilBurgerDbContext db) => _db = db;

    public Task<List<Quartier>> GetQuartiersByZoneAsync(int zoneId, CancellationToken ct = default)
        => _db.Quartiers.AsNoTracking()
            .Where(q => q.IdZone == zoneId)
            .OrderBy(q => q.Libelle)
            .ToListAsync(ct);

    public Task<List<Zone>> GetZonesAsync(CancellationToken ct = default)
        => _db.Zones.AsNoTracking().OrderBy(z => z.Libelle).ToListAsync(ct);
}