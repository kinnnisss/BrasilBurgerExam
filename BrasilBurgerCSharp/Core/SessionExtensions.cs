using System.Text.Json;
using Microsoft.AspNetCore.Http;
using BrasilBurgerCSharp.ViewModels.Commande;

namespace BrasilBurgerCSharp.Core;

public static class SessionExtensions
{
    private static readonly JsonSerializerOptions JsonOptions = new()
    {
        PropertyNameCaseInsensitive = true
    };

    public static void SetJson<T>(this ISession session, string key, T value)
        => session.SetString(key, JsonSerializer.Serialize(value, JsonOptions));

}
