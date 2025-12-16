namespace BrasilBurgerCSharp.Models;

public class Commande
{
    public int IdCommande { get; set; }
    public string Reference { get; set; } = "";
    public DateTime DateCommande { get; set; }
    public EtatCommande Etat { get; set; }
    public TypeConsommation TypeConsommation { get; set; }
    public decimal MontantTotal { get; set; }

    public int IdClient { get; set; }
    public Client? Client { get; set; }

    public int? IdZone { get; set; }
    public Zone? Zone { get; set; }

    public int? IdQuartier { get; set; }
    public Quartier? Quartier { get; set; }

    public int? IdLivreur { get; set; }
    public Livreur? Livreur { get; set; }

    public ICollection<LigneCommande> Lignes { get; set; } = new List<LigneCommande>();

    public Paiement? Paiement { get; set; } // 0..1 (unique id_commande)
}

