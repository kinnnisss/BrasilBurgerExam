namespace BrasilBurgerCSharp.DTOs;

public record MenuDetailsDto(
    int Id,
    string Nom,
    decimal Prix,
    string? Image,
    List<BurgerDto> Burgers,
    List<ComplementDto> Complements
);

