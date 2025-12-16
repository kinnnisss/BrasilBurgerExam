namespace BrasilBurgerCSharp.ViewModels.Catalogue;

public class MenuCardVm
{
    public int Id { get; set; }
    public string Nom { get; set; } = "";
    public decimal Prix { get; set; }
    public string? Image { get; set; }
}
