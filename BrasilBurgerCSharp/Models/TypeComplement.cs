using NpgsqlTypes;

namespace BrasilBurgerCSharp.Models;

public enum TypeComplement
{
    [PgName("FRITE")]
    FRITE,

    [PgName("BOISSON")]
    BOISSON
}
