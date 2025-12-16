namespace BrasilBurgerCSharp.ViewModels.Commande;

public class CheckoutVm
{
    public PanierVm Panier { get; set; } = new();

    public string TypeConsommation { get; set; } = "SUR_PLACE";
    public int? ZoneId { get; set; }
    public int? QuartierId { get; set; }

    public List<ZoneOptionVm> Zones { get; set; } = new();
    public List<QuartierOptionVm> Quartiers { get; set; } = new();

    public string? ErrorMessage { get; set; }
}

