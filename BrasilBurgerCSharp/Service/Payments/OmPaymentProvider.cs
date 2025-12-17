using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Service.Payments;

public sealed class OmPaymentProvider : IPaymentProvider
{
    public ModePaiement Mode => ModePaiement.OM;

    public Task<Paiement> PayAsync(Commande commande, CancellationToken ct = default)
    {
        var paiement = new Paiement
        {
            DatePaiement = DateTime.UtcNow,
            Montant = commande.MontantTotal,
            ModePaiement = ModePaiement.OM,
            IdCommande = commande.IdCommande
        };
        return Task.FromResult(paiement);
    }
}
