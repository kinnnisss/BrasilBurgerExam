namespace BrasilBurgerCSharp.Models;

public class Livreur
{
    public int IdLivreur { get; set; }
    public string Nom { get; set; } = "";
    public string Prenom { get; set; } = "";
    public string Telephone { get; set; } = "";

    public ICollection<Commande> Commandes { get; set; } = new List<Commande>();
}
