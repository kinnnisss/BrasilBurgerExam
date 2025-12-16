namespace BrasilBurgerCSharp.ViewModels.Catalogue;

public class CatalogueIndexVm
{
    public string? Filtre { get; set; }
    public List<BurgerCardVm> Burgers { get; set; } = new();
    public List<MenuCardVm> Menus { get; set; } = new();
}

