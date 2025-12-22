<?php

namespace App\Dto\Livraison;

class LivraisonZoneDto
{
    public int $zoneId;
    public string $zoneLibelle;
    public int $nbCommandes;
    public string $montantTotal;

    /** @var LivraisonCommandeDto[] */
    public array $commandes = [];

    /**
     * @param LivraisonCommandeDto[] $commandes
     */
    public function __construct(
        int $zoneId,
        string $zoneLibelle,
        int $nbCommandes,
        string $montantTotal,
        array $commandes
    ) {
        $this->zoneId = $zoneId;
        $this->zoneLibelle = $zoneLibelle;
        $this->nbCommandes = $nbCommandes;
        $this->montantTotal = $montantTotal;
        $this->commandes = $commandes;
    }
}
