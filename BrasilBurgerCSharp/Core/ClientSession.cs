using BrasilBurgerCSharp.ViewModels.Commande;

namespace BrasilBurgerCSharp.Core;


public static class ClientSession
{
    public const string ClientIdKey = "CLIENT_ID";
    public const string PanierKey = "PANIER";

    public static int? GetClientId(HttpContext http)
        => http.Session.GetInt32(ClientIdKey);

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
}
