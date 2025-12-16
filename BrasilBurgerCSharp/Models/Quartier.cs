namespace BrasilBurgerCSharp.Models;
public class Quartier
{
    public int IdQuartier { get; set; }
    public string Libelle { get; set; } = "";

    public int IdZone { get; set; }
    public Zone? Zone { get; set; }

    public ICollection<Commande> Commandes { get; set; } = new List<Commande>();
}
