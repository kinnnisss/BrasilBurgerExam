using System.Text.Json;
using Microsoft.AspNetCore.Http;
using BrasilBurgerCSharp.ViewModels.Commande;
using System.Security.Cryptography;

namespace BrasilBurgerCSharp.Core;

public static class SessionExtensions
{
    private static readonly JsonSerializerOptions JsonOptions = new()
    {
        PropertyNameCaseInsensitive = true
    };

    public static void SetJson<T>(this ISession session, string key, T value)
        => session.SetString(key, JsonSerializer.Serialize(value, JsonOptions));

    public static T? GetJson<T>(this ISession session, string key)
    {
        try
        {
            var s = session.GetString(key);
            if (string.IsNullOrWhiteSpace(s)) return default;

            return JsonSerializer.Deserialize<T>(s, JsonOptions);
        }
        catch (CryptographicException)
        {
            return default;
        }
        catch (JsonException)
        {
            return default;
        }
        catch
        {
            return default;
        }
    }


}
