using NpgsqlTypes;

namespace BrasilBurgerCSharp.Models;

public enum ModePaiement
{
    [PgName("OM")]
    OM,

    [PgName("WAVE")]
    WAVE
}
