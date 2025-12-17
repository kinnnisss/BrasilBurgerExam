using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Service.Payments;

public sealed class WavePaymentProvider : IPaymentProvider
{
    public ModePaiement Mode => ModePaiement.WAVE;

    public Task<Paiement> PayAsync(Commande commande, CancellationToken ct = default)
    {
        var paiement = new Paiement
        {
            DatePaiement = DateTime.UtcNow,
            Montant = commande.MontantTotal,
            ModePaiement = ModePaiement.WAVE,
            IdCommande = commande.IdCommande
        };
        return Task.FromResult(paiement);
    }
}
