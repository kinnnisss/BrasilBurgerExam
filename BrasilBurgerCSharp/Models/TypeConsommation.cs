using NpgsqlTypes;

namespace BrasilBurgerCSharp.Models;

public enum TypeConsommation
{
    [PgName("SUR_PLACE")]
    SUR_PLACE,

    [PgName("A_EMPORTER")]
    A_EMPORTER,

    [PgName("LIVRAISON")]
    LIVRAISON
}
