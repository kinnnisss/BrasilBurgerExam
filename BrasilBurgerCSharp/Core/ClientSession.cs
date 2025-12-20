using System.Security.Cryptography;
using BrasilBurgerCSharp.ViewModels.Commande;

namespace BrasilBurgerCSharp.Core;


public static class ClientSession
{
    public const string ClientIdKey = "CLIENT_ID";
    public const string PanierKey = "PANIER";

    public static int? GetClientId(HttpContext context)
    {
        try
        {
            return context.Session.GetInt32(ClientIdKey);
        }
        catch (CryptographicException)
        {
            SafeResetSession(context);
            return null;
        }
    }


    private static void SafeResetSession(HttpContext context)
    {
        try { context.Session.Clear(); } catch { /* ignore */ }

        context.Response.Cookies.Delete(".AspNetCore.Session");
    }
    public static void SetClientId(HttpContext http, int clientId)
        => http.Session.SetInt32(ClientIdKey, clientId);

    public static void ClearClient(HttpContext http)
        => http.Session.Remove(ClientIdKey);

    public static PanierVm GetPanier(HttpContext http)
        => http.Session.GetJson<PanierVm>(PanierKey) ?? new PanierVm();

    public static void SavePanier(HttpContext http, PanierVm panier)
        => http.Session.SetJson(PanierKey, panier);

    public static void ClearPanier(HttpContext http)
        => http.Session.Remove(PanierKey);

    public static int GetPanierCount(HttpContext ctx)
    {
        var panier = GetPanier(ctx);
        if (panier?.Items is null) return 0;

        return panier.Items.Sum(i => i.Quantite);
    }

    }
