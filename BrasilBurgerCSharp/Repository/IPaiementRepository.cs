using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Repository;

public interface IPaiementRepository
{
    Task<bool> HasPaiementAsync(int commandeId, CancellationToken ct = default);
    Task<Paiement?> GetByCommandeAsync(int commandeId, CancellationToken ct = default);
    Task<Paiement> CreateAsync(Paiement paiement, CancellationToken ct = default);
}
