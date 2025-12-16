namespace BrasilBurgerCSharp.ViewModels.Catalogue;

public class MenuDetailsVm
{
    public int Id { get; set; }
    public string Nom { get; set; } = "";
    public decimal Prix { get; set; }
    public string? Image { get; set; }

    public List<BurgerCardVm> Burgers { get; set; } = new();
    public List<ComplementVm> Complements { get; set; } = new();

    public int Quantite { get; set; } = 1;
}

