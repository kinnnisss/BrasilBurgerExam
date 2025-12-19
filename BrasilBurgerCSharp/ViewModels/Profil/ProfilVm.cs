namespace BrasilBurgerCSharp.ViewModels.Profil;

public class ProfilVm
{
    public string NomComplet { get; set; } = "";
    public string? Telephone { get; set; }
    public string? Email { get; set; }
    public string? Adresse { get; set; }
    public string? Initiales { get; set; }

    public DateTime? DateInscription { get; set; }
    public int NbCommandes { get; set; }
    public int NbEnCours { get; set; }
    public decimal TotalFcfa { get; set; }
}
