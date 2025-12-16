namespace BrasilBurgerCSharp.DTOs;
public record CatalogueDto(
    List<BurgerDto> Burgers,
    List<MenuDto> Menus
);
