namespace BrasilBurgerCSharp.DTOs;

public record CommandeDetailsDto(
    CommandeDto Commande,
    List<LigneCommandeDto> Lignes,
    string? Zone,
    string? Quartier,
    string? Livreur,
    string? ModePaiement
);

