using System.ComponentModel.DataAnnotations;

namespace BrasilBurgerCSharp.ViewModels.Commande;

public class PaymentLineVm
{
    public string Libelle { get; set; } = "";
    public int Quantite { get; set; }
    public decimal Montant { get; set; }
}