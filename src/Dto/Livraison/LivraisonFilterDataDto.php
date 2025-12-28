<?php

namespace App\Dto\Livraison;

use App\Dto\Common\SelectItemDto;

class LivraisonFilterDataDto
{
    /** @var SelectItemDto[] */
    public array $zones = [];

    /** @var SelectItemDto[] */
    public array $livreurs = [];

    /**
     * @param SelectItemDto[] $zones
     * @param SelectItemDto[] $livreurs
     */
    public function __construct(array $zones, array $livreurs)
    {
        $this->zones = $zones;
        $this->livreurs = $livreurs;
    }
}
