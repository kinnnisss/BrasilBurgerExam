<?php

namespace App\Service\Impl;

use App\Dto\Catalogue\DashboardDto;
use App\Repository\StatistiqueRepository;
use App\Service\DashboardServiceInterface;

class DashboardService implements DashboardServiceInterface
{
    public function __construct(
        private readonly StatistiqueRepository $statistiqueRepository
    ) {}

    public function getDashboard(\DateTimeInterface $day): DashboardDto
    {
        $enCours = $this->statistiqueRepository->countCommandesEnCoursDuJour($day);
        $validees = $this->statistiqueRepository->countCommandesValideesDuJour($day);
        $annulees = $this->statistiqueRepository->countCommandesAnnuleesDuJour($day);
        $recettes = $this->statistiqueRepository->sumRecettesDuJour($day);
        $terminees = $this->statistiqueRepository->countCommandesTermineesDuJour($day);

        $topBurgers = $this->statistiqueRepository->topBurgersDuJour($day, 5);

        return new DashboardDto(
            $enCours,
            $validees,
            $annulees,
            (string)$recettes,
            $topBurgers,
            $terminees
        );
    }
}
