<?php

namespace App\Dto\Livraison;

use App\Enum\EtatCommandeEnum;
use Symfony\Component\Validator\Constraints as Assert;

class LivraisonFilterDto
{
    #[Assert\Positive(message: 'zoneId invalide.')]
    public ?int $zoneId = null;

    #[Assert\Positive(message: 'livreurId invalide.')]
    public ?int $livreurId = null;

    public ?EtatCommandeEnum $etat = null;

    #[Assert\Positive(message: 'Page invalide.')]
    public int $page = 1;

    #[Assert\Range(min: 1, max: 200)]
    public int $pageSize = 20;
}
