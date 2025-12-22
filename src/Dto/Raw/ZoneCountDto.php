<?php

namespace App\Dto\Raw;

class ZoneCountDto
{
    public int $zoneId;
    public string $zoneLibelle;
    public int $nbCommandes;
    public string $montantTotal;

    public function __construct(int $zoneId, string $zoneLibelle, int $nbCommandes, string $montantTotal)
    {
        $this->zoneId = $zoneId;
        $this->zoneLibelle = $zoneLibelle;
        $this->nbCommandes = $nbCommandes;
        $this->montantTotal = $montantTotal;
    }
}
