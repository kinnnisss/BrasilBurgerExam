namespace BrasilBurgerCSharp.Models;

public class Menu
{
    public int IdMenu { get; set; }
    public string Nom { get; set; } = "";
    public string? Image { get; set; }
    public decimal Prix { get; set; }
    public bool IsArchived { get; set; }

    public ICollection<MenuBurger> MenuBurgers { get; set; } = new List<MenuBurger>();
    public ICollection<MenuComplement> MenuComplements { get; set; } = new List<MenuComplement>();
    public ICollection<LigneCommande> LignesCommande { get; set; } = new List<LigneCommande>();
}
