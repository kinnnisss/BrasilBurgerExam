using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class PaiementRepository : IPaiementRepository
{
    private readonly BrasilBurgerDbContext _db;

    public PaiementRepository(BrasilBurgerDbContext db) => _db = db;

    public async Task<Paiement> CreateAsync(Paiement paiement, CancellationToken ct = default)
    {
        _db.Paiements.Add(paiement);
        await _db.SaveChangesAsync(ct);
        return paiement;
    }

    public Task<Paiement?> GetByCommandeAsync(int commandeId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<bool> HasPaiementAsync(int commandeId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}