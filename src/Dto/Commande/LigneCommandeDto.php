<?php

namespace App\Dto\Commande;

use App\Enum\TypeArticleEnum;

class LigneCommandeDto
{
    public TypeArticleEnum $typeArticle;
    public string $designation;
    public ?string $image;
    public int $quantite;
    public string $prixUnitaire;
    public string $prixTotal;

    public function __construct(
        TypeArticleEnum $typeArticle,
        string $designation,
        ?string $image,
        int $quantite,
        string $prixUnitaire,
        string $prixTotal
    ) {
        $this->typeArticle = $typeArticle;
        $this->designation = $designation;
        $this->image = $image;
        $this->quantite = $quantite;
        $this->prixUnitaire = $prixUnitaire;
        $this->prixTotal = $prixTotal;
    }
}
