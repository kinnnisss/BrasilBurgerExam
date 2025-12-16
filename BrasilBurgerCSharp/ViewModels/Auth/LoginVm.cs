namespace BrasilBurgerCSharp.ViewModels.Auth;

public class LoginVm
{
    public string Login { get; set; } = "";
    public string Password { get; set; } = "";
    public string? ErrorMessage { get; set; }
}

