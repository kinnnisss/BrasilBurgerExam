namespace BrasilBurgerCSharp.Models;

public class Burger
{
    public int IdBurger { get; set; }
    public string Nom { get; set; } = "";
    public decimal Prix { get; set; }
    public string? Image { get; set; }
    public bool IsArchived { get; set; }

    public ICollection<MenuBurger> MenuBurgers { get; set; } = new List<MenuBurger>();
    public ICollection<LigneCommande> LignesCommande { get; set; } = new List<LigneCommande>();
}
