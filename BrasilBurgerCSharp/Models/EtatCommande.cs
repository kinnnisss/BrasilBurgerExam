using NpgsqlTypes;
namespace BrasilBurgerCSharp.Models;


public enum EtatCommande
{
    [PgName("ENCOURS")]
    ENCOURS,

    [PgName("VALIDEE")]
    VALIDEE,

    [PgName("TERMINER")]
    TERMINER,
    
    [PgName("ANNULEE")]
    ANNULEE
}

