namespace BrasilBurgerCSharp.ViewModels.Commande;

public class PanierVm
{
    public List<PanierItemVm> Items { get; set; } = new();
    public decimal Total { get; set; }
}

