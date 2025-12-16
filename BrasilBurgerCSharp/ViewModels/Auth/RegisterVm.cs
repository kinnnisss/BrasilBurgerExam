namespace BrasilBurgerCSharp.ViewModels.Auth;


public class RegisterVm
{
    public string Nom { get; set; } = "";
    public string Prenom { get; set; } = "";
    public string Telephone { get; set; } = "";
    public string Login { get; set; } = "";
    public string Password { get; set; } = "";
    public string ConfirmPassword { get; set; } = "";

    public string? ErrorMessage { get; set; }
}
