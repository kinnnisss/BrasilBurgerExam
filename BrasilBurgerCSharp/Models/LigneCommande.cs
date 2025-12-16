namespace BrasilBurgerCSharp.Models;

public class LigneCommande
{
    public int IdLigneCommande { get; set; }

    public int IdCommande { get; set; }
    public Commande? Commande { get; set; }

    public TypeArticle TypeArticle { get; set; }

    public int? IdBurger { get; set; }
    public Burger? Burger { get; set; }

    public int? IdMenu { get; set; }
    public Menu? Menu { get; set; }

    public int? IdComplement { get; set; }
    public Complement? Complement { get; set; }

    public int Quantite { get; set; }
    public decimal PrixUnitaire { get; set; }
    public decimal PrixTotal { get; set; }
}

