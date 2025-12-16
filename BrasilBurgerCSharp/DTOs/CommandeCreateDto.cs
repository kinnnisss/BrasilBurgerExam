namespace BrasilBurgerCSharp.DTOs;


public record CommandeCreateDto(
    int ClientId,
    List<LigneCommandeCreateDto> Lignes,
    string TypeConsommation,
    int? ZoneId,
    int? QuartierId
);

