using System.ComponentModel.DataAnnotations;

namespace BrasilBurgerCSharp.ViewModels.Commande;

public class PaymentVm
{
    [Required]
    public int CommandeId { get; set; }
    public string Reference { get; set; } = "";
    public decimal Montant { get; set; }
    public string ModePaiement { get; set; } = "WAVE"; // OM/WAVE
    public string? ErrorMessage { get; set; }
}

