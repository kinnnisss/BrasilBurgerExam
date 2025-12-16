namespace BrasilBurgerCSharp.ViewModels.Catalogue;

public class ComplementVm
{
    public int Id { get; set; }
    public string Nom { get; set; } = "";
    public decimal Prix { get; set; }
    public string? Image { get; set; }
    public string TypeComplement { get; set; } = "";
}
