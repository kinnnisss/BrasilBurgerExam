using System.ComponentModel.DataAnnotations;

namespace BrasilBurgerCSharp.ViewModels.Auth;

public class RegisterVm
{
    [Required(ErrorMessage = "Le nom est obligatoire.")]
    [StringLength(60, MinimumLength = 2, ErrorMessage = "Le nom doit contenir entre {2} et {1} caractères.")]
    public string Nom { get; set; } = "";

    [Required(ErrorMessage = "Le prénom est obligatoire.")]
    [StringLength(60, MinimumLength = 2, ErrorMessage = "Le prénom doit contenir entre {2} et {1} caractères.")]
    public string Prenom { get; set; } = "";

    [Required(ErrorMessage = "Le téléphone est obligatoire.")]
    [RegularExpression(@"^\d{9}$",
        ErrorMessage = "Téléphone invalide. Utilise uniquement des chiffres (9).")]
    [Display(Name = "Téléphone")]
    public string Telephone { get; set; } = "";

    [Required(ErrorMessage = "Le login est obligatoire.")]
    [StringLength(50, MinimumLength = 3, ErrorMessage = "Le login doit contenir entre {2} et {1} caractères.")]
    public string Login { get; set; } = "";

    [Required(ErrorMessage = "Le mot de passe est obligatoire.")]
    [DataType(DataType.Password)]
    [StringLength(100, MinimumLength = 6, ErrorMessage = "Le mot de passe doit contenir au moins {2} caractères.")]
    public string Password { get; set; } = "";

    [Required(ErrorMessage = "La confirmation est obligatoire.")]
    [DataType(DataType.Password)]
    [Compare(nameof(Password), ErrorMessage = "Les mots de passe ne correspondent pas.")]
    public string ConfirmPassword { get; set; } = "";

    public string? ErrorMessage { get; set; }
}
