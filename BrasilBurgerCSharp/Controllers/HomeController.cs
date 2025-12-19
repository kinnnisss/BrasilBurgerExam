using Microsoft.AspNetCore.Mvc;

namespace BrasilBurgerCSharp.Controllers;

public sealed class HomeController : Controller
{
    [HttpGet]
    public IActionResult Contact()
    {
        ViewData["Title"] = "À propos";
        return View();
    }
}
