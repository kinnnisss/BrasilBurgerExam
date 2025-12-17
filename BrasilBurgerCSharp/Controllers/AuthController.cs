using Microsoft.AspNetCore.Mvc;
using BrasilBurgerCSharp.Service;
using BrasilBurgerCSharp.DTOs;
using BrasilBurgerCSharp.ViewModels.Auth;
using BrasilBurgerCSharp.Core;

namespace BrasilBurgerCSharp.Controllers;

public sealed class AuthController : Controller
{
    private readonly IAuthService _auth;

    public AuthController(IAuthService auth) => _auth = auth;

    [HttpGet]
    public IActionResult Login(string? returnUrl = null)
        => View(new LoginVm { });

    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Login(LoginVm vm, string? returnUrl = null, CancellationToken ct = default)
    {
        if (string.IsNullOrWhiteSpace(vm.Login) || string.IsNullOrWhiteSpace(vm.Password))
        {
            vm.ErrorMessage = "Login et mot de passe obligatoires.";
            return View(vm);
        }

        var res = await _auth.LoginAsync(new LoginDto(vm.Login, vm.Password), ct);

        if (!res.Success || res.Data is null)
        {
            vm.ErrorMessage = res.Message ?? "Connexion impossible.";
            return View(vm);
        }

        ClientSession.SetClientId(HttpContext, res.Data.Id);

        if (!string.IsNullOrWhiteSpace(returnUrl) && Url.IsLocalUrl(returnUrl))
            return Redirect(returnUrl);

        return RedirectToAction("Index", "Catalogue");
    }


    [HttpPost]
    [ValidateAntiForgeryToken]
    public IActionResult Logout()
    {
        ClientSession.ClearClient(HttpContext);
        ClientSession.ClearPanier(HttpContext);
        return RedirectToAction("Index", "Catalogue");
    }
}
