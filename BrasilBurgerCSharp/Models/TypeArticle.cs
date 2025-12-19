using NpgsqlTypes;

namespace BrasilBurgerCSharp.Models;

public enum TypeArticle
{
    [PgName("BURGER")]
    BURGER,

    [PgName("MENU")]
    MENU,

    [PgName("COMPLEMENT")]
    COMPLEMENT
}
