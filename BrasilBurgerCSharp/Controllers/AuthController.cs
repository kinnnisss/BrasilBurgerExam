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
}
