using System.ComponentModel.DataAnnotations;

namespace BrasilBurgerCSharp.ViewModels.Commande;

public class CheckoutVm
{
    public PanierVm Panier { get; set; } = new();

    [Required(ErrorMessage = "Le type de consommation est obligatoire.")]
    [RegularExpression(@"^(SUR_PLACE|A_EMPORTER|LIVRAISON)$",
        ErrorMessage = "Type de consommation invalide.")]
    public string TypeConsommation { get; set; } = "SUR_PLACE";

    public int? ZoneId { get; set; }
    public int? QuartierId { get; set; }

    public List<ZoneOptionVm> Zones { get; set; } = new();
    public List<QuartierOptionVm> Quartiers { get; set; } = new();

    public string? ErrorMessage { get; set; }
    public bool ReadonlyMode { get; set; }
}
