using Microsoft.EntityFrameworkCore;
using BrasilBurgerCSharp.Data;
using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository.Impl;

public sealed class CommandeRepository : ICommandeRepository
{
    private readonly BrasilBurgerDbContext _db;

    public CommandeRepository(BrasilBurgerDbContext db) => _db = db;

    public async Task AddLignesAsync(int commandeId, List<LigneCommande> lignes, CancellationToken ct = default)
    {
        foreach (var l in lignes)
            l.IdCommande = commandeId;
        _db.LigneCommandes.AddRange(lignes);
        await _db.SaveChangesAsync(ct);
    }


    public async Task<Commande> CreateCommandeAsync(Commande commande, CancellationToken ct = default)
    {
        _db.Commandes.Add(commande);
        await _db.SaveChangesAsync(ct);
        return commande;
    }
    public Task<Commande?> GetCommandeDetailsAsync(int commandeId, int clientId, CancellationToken ct = default)
        => _db.Commandes.AsNoTracking()
            .Where(c => c.IdCommande == commandeId && c.IdClient == clientId)
            .Include(c => c.Zone)
            .Include(c => c.Quartier)
            .Include(c => c.Livreur)
            .Include(c => c.Paiement)
            .Include(c => c.Lignes)
                .ThenInclude(l => l.Burger)
            .Include(c => c.Lignes)
                .ThenInclude(l => l.Menu)
            .Include(c => c.Lignes)
                .ThenInclude(l => l.Complement)
            .SingleOrDefaultAsync(ct);
    public Task<List<Commande>> GetEnCoursByClientAsync(int clientId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }

    public Task<List<Commande>> GetHistoriqueByClientAsync(int clientId, CancellationToken ct = default)
    {
        throw new NotImplementedException();
    }
}