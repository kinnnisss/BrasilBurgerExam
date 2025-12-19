using System.ComponentModel.DataAnnotations;
using BrasilBurgerCSharp.DTOs;

namespace BrasilBurgerCSharp.ViewModels.Commande;

public class PaymentVm
{
    [Required]
    public int CommandeId { get; set; }
    public string Reference { get; set; } = "";
    public decimal Montant { get; set; }
    public string ModePaiement { get; set; } = "WAVE"; // OM/WAVE
    public string? ErrorMessage { get; set; }

    public string TypeConsommation { get; set; } = ""; // SUR_PLACE / A_EMPORTER / LIVRAISON
    public decimal SousTotal { get; set; }
    public decimal FraisLivraison { get; set; }

    public List<LigneCommandeDto> Lignes { get; set; } = new();
}

