namespace BrasilBurgerCSharp.ViewModels.Commande;

public class ConfirmationVm
{
    public int CommandeId { get; set; }
    public string Reference { get; set; } = "";
    public decimal MontantTotal { get; set; }
    public bool EstPayee { get; set; }
}
