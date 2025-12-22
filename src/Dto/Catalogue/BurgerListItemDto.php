<?php

namespace App\Dto\Catalogue;

class BurgerListItemDto
{
    public int $id;
    public string $nom;
    public string $prix;
    public ?string $image;
    public bool $isArchived;

    public function __construct(int $id, string $nom, string $prix, ?string $image, bool $isArchived)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->image = $image;
        $this->isArchived = $isArchived;
    }
}
