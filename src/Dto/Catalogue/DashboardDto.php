<?php

namespace App\Dto\Catalogue;

use App\Dto\Raw\TopBurgerDto;

class DashboardDto
{
    public int $enCours;
    public int $validees;
    public int $annulees;
    public string $recettes;
    public int $terminees;

    /** @var TopBurgerDto[] */
    public array $topBurgers = [];

    /**
     * @param TopBurgerDto[] $topBurgers
     */
    public function __construct(int $enCours, int $validees, int $annulees, string $recettes, array $topBurgers,int $terminees)
    {
        $this->enCours = $enCours;
        $this->validees = $validees;
        $this->annulees = $annulees;
        $this->recettes = $recettes;
        $this->topBurgers = $topBurgers;
        $this->terminees = $terminees;
    }
}
