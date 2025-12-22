<?php

namespace App\Dto\Catalogue;

class BurgerEditDto
{
    public int $id;
    public string $nom;
    public string $prix;
    public ?string $currentImagePath;
    public bool $isArchived;

    public function __construct(int $id, string $nom, string $prix, ?string $currentImagePath, bool $isArchived)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->currentImagePath = $currentImagePath;
        $this->isArchived = $isArchived;
    }
}
