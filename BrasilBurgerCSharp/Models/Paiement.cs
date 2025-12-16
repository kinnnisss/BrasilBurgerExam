namespace BrasilBurgerCSharp.Models;
public class Paiement
{
    public int IdPaiement { get; set; }
    public DateTime DatePaiement { get; set; }
    public decimal Montant { get; set; }
    public ModePaiement ModePaiement { get; set; }

    public int IdCommande { get; set; }
    public Commande? Commande { get; set; }
}
