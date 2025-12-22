<?php

namespace App\Dto\Commande;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeConsommationEnum;

class CommandeListItemDto
{
    public int $id;
    public string $reference;
    public \DateTimeInterface $dateCommande;
    public string $clientNomComplet;
    public string $clientTelephone;
    public TypeConsommationEnum $typeConsommation;
    public string $montantTotal;
    public EtatCommandeEnum $etat;

    public function __construct(
        int $id,
        string $reference,
        \DateTimeInterface $dateCommande,
        string $clientNomComplet,
        string $clientTelephone,
        TypeConsommationEnum $typeConsommation,
        string $montantTotal,
        EtatCommandeEnum $etat
    ) {
        $this->id = $id;
        $this->reference = $reference;
        $this->dateCommande = $dateCommande;
        $this->clientNomComplet = $clientNomComplet;
        $this->clientTelephone = $clientTelephone;
        $this->typeConsommation = $typeConsommation;
        $this->montantTotal = $montantTotal;
        $this->etat = $etat;
    }
}
