namespace BrasilBurgerCSharp.Models;

public class Client
{
    public int IdClient { get; set; }
    public string Nom { get; set; } = "";
    public string Prenom { get; set; } = "";
    public string Telephone { get; set; } = "";
    public string Login { get; set; } = "";
    public string Password { get; set; } = "";

    public ICollection<Commande> Commandes { get; set; } = new List<Commande>();
}
