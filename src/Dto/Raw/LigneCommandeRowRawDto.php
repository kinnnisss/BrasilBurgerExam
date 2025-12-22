<?php

namespace App\Dto\Raw;

use App\Enum\TypeArticleEnum;

class LigneCommandeRowRawDto
{
    public TypeArticleEnum $typeArticle;
    public int $quantite;
    public string $prixUnitaire;
    public string $prixTotal;

    public ?int $idBurger;
    public ?string $burgerNom;
    public ?string $burgerImage;

    public ?int $idMenu;
    public ?string $menuNom;
    public ?string $menuImage;

    public ?int $idComplement;
    public ?string $complementNom;
    public ?string $complementImage;

    public function __construct(
        TypeArticleEnum $typeArticle,
        int $quantite,
        string $prixUnitaire,
        string $prixTotal,

        ?int $idBurger,
        ?string $burgerNom,
        ?string $burgerImage,

        ?int $idMenu,
        ?string $menuNom,
        ?string $menuImage,

        ?int $idComplement,
        ?string $complementNom,
        ?string $complementImage
    ) {
        $this->typeArticle = $typeArticle;
        $this->quantite = $quantite;
        $this->prixUnitaire = $prixUnitaire;
        $this->prixTotal = $prixTotal;

        $this->idBurger = $idBurger;
        $this->burgerNom = $burgerNom;
        $this->burgerImage = $burgerImage;

        $this->idMenu = $idMenu;
        $this->menuNom = $menuNom;
        $this->menuImage = $menuImage;

        $this->idComplement = $idComplement;
        $this->complementNom = $complementNom;
        $this->complementImage = $complementImage;
    }

    public function getDesignation(): string
    {
        return match ($this->typeArticle) {
            TypeArticleEnum::BURGER => $this->burgerNom ?? '',
            TypeArticleEnum::MENU => $this->menuNom ?? '',
            TypeArticleEnum::COMPLEMENT => $this->complementNom ?? '',
        };
    }

    public function getImage(): ?string
    {
        return match ($this->typeArticle) {
            TypeArticleEnum::BURGER => $this->burgerImage,
            TypeArticleEnum::MENU => $this->menuImage,
            TypeArticleEnum::COMPLEMENT => $this->complementImage,
        };
    }
}
