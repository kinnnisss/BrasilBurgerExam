namespace BrasilBurgerCSharp.ViewModels.Profil;

public class ProfilVm
{
    public string NomComplet { get; set; } = "";
    public string Telephone { get; set; } = "";
    public string Login { get; set; } = "";
    public string Initiales { get; set; } = "BB";

    public int NbCommandes { get; set; }
    public int NbEnCours { get; set; }
    public decimal TotalFcfa { get; set; }
}
