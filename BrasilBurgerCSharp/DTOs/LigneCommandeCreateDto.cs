namespace BrasilBurgerCSharp.DTOs;

public record LigneCommandeCreateDto(
    string TypeArticle,          
    int ArticleId,              
    int Quantite
);

