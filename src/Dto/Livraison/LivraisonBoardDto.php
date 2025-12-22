<?php

namespace App\Dto\Livraison;

class LivraisonBoardDto
{
    /** @var LivraisonZoneDto[] */
    public array $zones = [];

    /**
     * @param LivraisonZoneDto[] $zones
     */
    public function __construct(array $zones)
    {
        $this->zones = $zones;
    }
}
