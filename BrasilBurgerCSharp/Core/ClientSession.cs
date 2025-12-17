using BrasilBurgerCSharp.ViewModels.Commande;

namespace BrasilBurgerCSharp.Core;


public static class ClientSession
{
    public const string ClientIdKey = "CLIENT_ID";
    public const string PanierKey = "PANIER";

    public static int? GetClientId(HttpContext http)
        => http.Session.GetInt32(ClientIdKey);


}
