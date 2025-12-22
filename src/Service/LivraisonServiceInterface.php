<?php

namespace App\Service;

use App\Dto\Common\ActionResultDto;
use App\Dto\Livraison\LivraisonAssignDto;
use App\Dto\Livraison\LivraisonBoardDto;
use App\Dto\Livraison\LivraisonFilterDataDto;
use App\Dto\Livraison\LivraisonFilterDto;

interface LivraisonServiceInterface
{
    public function getBoard(LivraisonFilterDto $filter): LivraisonBoardDto;

    public function getFilterData(): LivraisonFilterDataDto;

    public function assignLivreur(int $idCommande, LivraisonAssignDto $dto): ActionResultDto;
}
