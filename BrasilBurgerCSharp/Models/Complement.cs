namespace BrasilBurgerCSharp.Models;

public class Complement
{
    public int IdComplement { get; set; }
    public string Nom { get; set; } = "";
    public TypeComplement TypeComplement { get; set; }
    public decimal Prix { get; set; }
    public string? Image { get; set; }
    public bool IsArchived { get; set; }

    public ICollection<MenuComplement> MenuComplements { get; set; } = new List<MenuComplement>();
    public ICollection<LigneCommande> LignesCommande { get; set; } = new List<LigneCommande>();
}
