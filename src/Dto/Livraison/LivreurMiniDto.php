<?php

namespace App\Dto\Livraison;

class LivreurMiniDto
{
    public int $id;
    public string $nomComplet;
    public string $telephone;

    public function __construct(int $id, string $nomComplet, string $telephone)
    {
        $this->id = $id;
        $this->nomComplet = $nomComplet;
        $this->telephone = $telephone;
    }
}
