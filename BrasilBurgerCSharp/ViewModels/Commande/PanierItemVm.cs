namespace BrasilBurgerCSharp.ViewModels.Commande;

public class PanierItemVm
{
    public string TypeArticle { get; set; } = ""; // BURGER/MENU/COMPLEMENT
    public int ArticleId { get; set; }
    public string Libelle { get; set; } = "";
    public string? Image { get; set; }
    public int Quantite { get; set; }
    public decimal PrixUnitaire { get; set; }
    public decimal PrixTotal { get; set; }
}

