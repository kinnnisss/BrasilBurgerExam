namespace BrasilBurgerCSharp.ViewModels.Auth;
using System.ComponentModel.DataAnnotations;
public class LoginVm
{
    [Required(ErrorMessage = "Le login est obligatoire.")]
    [StringLength(50, ErrorMessage = "Le login ne doit pas dépasser {1} caractères.")]
    public string Login { get; set; } = "";
    
    [Required(ErrorMessage = "Le mot de passe est obligatoire.")]
    [DataType(DataType.Password)]
    [StringLength(100, MinimumLength = 4, ErrorMessage = "Le mot de passe doit contenir au moins {2} caractères.")]
    public string Password { get; set; } = "";
    public string? ErrorMessage { get; set; }
}

