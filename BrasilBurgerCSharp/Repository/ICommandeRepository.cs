using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository;

public interface ICommandeRepository
{
    Task<Commande> CreateCommandeAsync(Commande commande, CancellationToken ct = default);
    Task AddLignesAsync(int commandeId, List<LigneCommande> lignes, CancellationToken ct = default);
    Task<List<Commande>> GetHistoriqueByClientAsync(int clientId, CancellationToken ct = default);
    Task<List<Commande>> GetEnCoursByClientAsync(int clientId, CancellationToken ct = default);
    Task<Commande?> GetCommandeDetailsAsync(int commandeId, int clientId, CancellationToken ct = default);
}
