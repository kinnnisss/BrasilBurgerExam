<?php

namespace App\Service\Impl;

use App\Dto\Common\ActionResultDto;
use App\Dto\Livraison\LivraisonAssignDto;
use App\Dto\Livraison\LivraisonBoardDto;
use App\Dto\Livraison\LivraisonCommandeDto;
use App\Dto\Livraison\LivraisonFilterDataDto;
use App\Dto\Livraison\LivraisonFilterDto;
use App\Dto\Livraison\LivraisonZoneDto;
use App\Dto\Livraison\LivreurMiniDto;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use App\Repository\ZoneRepository;
use App\Service\LivraisonServiceInterface;

class LivraisonService implements LivraisonServiceInterface
{
    public function __construct(
        private readonly LivraisonRepository $livraisonRepository,
        private readonly ZoneRepository $zoneRepository,
        private readonly LivreurRepository $livreurRepository
    ) {}

    public function getFilterData(): LivraisonFilterDataDto
    {
        return new LivraisonFilterDataDto(
            $this->zoneRepository->findAllForSelect(),
            $this->livreurRepository->findAllForSelect()
        );
    }

    private function moneyAdd(string $a, string $b): string
    {
        if (function_exists('bcadd')) {
            return bcadd($a, $b, 2);
        }
        return number_format(((float)$a + (float)$b), 2, '.', '');
    }

}
