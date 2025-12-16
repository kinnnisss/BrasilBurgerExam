namespace BrasilBurgerCSharp.DTOs;

public record LigneCommandeDto(
    string TypeArticle,
    int Quantite,
    decimal PrixUnitaire,
    decimal PrixTotal,
    string LibelleArticle,
    string? ImageArticle
);
