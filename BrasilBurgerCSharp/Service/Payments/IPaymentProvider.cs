using BrasilBurgerCSharp.Models;

namespace BrasilBurgerCSharp.Service.Payments;
public interface IPaymentProvider
{
    ModePaiement Mode { get; }
    Task<Paiement> PayAsync(Commande commande, CancellationToken ct = default);
}
