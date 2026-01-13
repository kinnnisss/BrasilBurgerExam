namespace BrasilBurgerCSharp.ViewModels.Suivi;

public class CommandeRowVm
{
    public int Id { get; set; }
    public string Reference { get; set; } = "";
    public DateTime DateCommande { get; set; }
    public string Etat { get; set; } = "";
    public decimal MontantTotal { get; set; }
    public bool EstPayee { get; set; }
    public string TypeConsommation { get; set; } = "";
    public List<string> ResumeArticles { get; set; } = new();
    public DateTime? DateValidation { get; set; }
    public DateTime? DateTerminaison { get; set; }
    public DateTime? DateAnnulation { get; set; }
    public DateTime? DateMajEtat { get; set; }


}
