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
    {
        ViewBag.ReturnUrl = returnUrl;
        return View(new LoginVm());
    }
    [HttpPost]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Login(LoginVm model, string? returnUrl = null, CancellationToken ct = default)
    {
        ViewBag.ReturnUrl = returnUrl;

        if (string.IsNullOrWhiteSpace(model.Login) || string.IsNullOrWhiteSpace(model.Password))
        {
            model.ErrorMessage = "Login et mot de passe obligatoires.";
            return View(model);
        }

        var res = await _auth.LoginAsync(new LoginDto(model.Login, model.Password), ct);
        if (!res.Success || res.Data is null)
        {
            model.ErrorMessage = res.Message ?? "Login ou mot de passe incorrect.";
            return View(model);
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
