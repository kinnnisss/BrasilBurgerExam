<?php

namespace App\Dto\Raw;

class TopBurgerDto
{
    public int $idBurger;
    public string $nom;
    public int $totalQuantite;

    public function __construct(int $idBurger, string $nom, int $totalQuantite)
    {
        $this->idBurger = $idBurger;
        $this->nom = $nom;
        $this->totalQuantite = $totalQuantite;
    }
}
