<?php

namespace App\Dto\Catalogue;

use App\Enum\TypeComplementEnum;

class ComplementEditDto
{
    public int $id;
    public string $nom;
    public TypeComplementEnum $type;
    public string $prix;
    public ?string $currentImagePath;
    public bool $isArchived;

    public function __construct(
        int $id,
        string $nom,
        TypeComplementEnum $type,
        string $prix,
        ?string $currentImagePath,
        bool $isArchived
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->type = $type;
        $this->prix = $prix;
        $this->currentImagePath = $currentImagePath;
        $this->isArchived = $isArchived;
    }
}
