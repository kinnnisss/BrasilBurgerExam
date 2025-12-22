<?php

namespace App\Dto\Catalogue;

class MenuEditDto
{
    public int $id;
    public string $nom;

    public int $burgerId;
    public int $fritesId;
    public int $boissonId;

    public MenuPriceDto $prixCalcule;

    public ?string $currentImagePath;
    public bool $isArchived;

    public function __construct(
        int $id,
        string $nom,
        int $burgerId,
        int $fritesId,
        int $boissonId,
        MenuPriceDto $prixCalcule,
        ?string $currentImagePath,
        bool $isArchived
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->burgerId = $burgerId;
        $this->fritesId = $fritesId;
        $this->boissonId = $boissonId;
        $this->prixCalcule = $prixCalcule;
        $this->currentImagePath = $currentImagePath;
        $this->isArchived = $isArchived;
    }
}
