namespace BrasilBurgerCSharp.Models;

public class Zone
{
    public int IdZone { get; set; }
    public string Libelle { get; set; } = "";
    public decimal PrixLivraison { get; set; }

    public ICollection<Quartier> Quartiers { get; set; } = new List<Quartier>();
    public ICollection<Commande> Commandes { get; set; } = new List<Commande>();
}

