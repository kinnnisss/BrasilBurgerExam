<?php

namespace App\Dto\Catalogue;

use App\Enum\TypeComplementEnum;

class ComplementListItemDto
{
    public int $id;
    public string $nom;
    public TypeComplementEnum $type;
    public string $prix;
    public ?string $image;
    public bool $isArchived;

    public function __construct(
        int $id,
        string $nom,
        TypeComplementEnum $type,
        string $prix,
        ?string $image,
        bool $isArchived
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->prix = $prix;
        $this->image = $image;
        $this->isArchived = $isArchived;
    }
}
