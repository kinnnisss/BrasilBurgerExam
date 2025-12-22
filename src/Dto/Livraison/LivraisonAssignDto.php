<?php

namespace App\Dto\Livraison;

use Symfony\Component\Validator\Constraints as Assert;

class LivraisonAssignDto
{
    #[Assert\Positive(message: 'Livreur invalide.')]
    public int $livreurId = 0;
}
