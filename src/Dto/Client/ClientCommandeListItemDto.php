<?php

namespace App\Dto\Client;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeConsommationEnum;

class ClientCommandeListItemDto
{
    public int $idCommande;
    public string $reference;
    public \DateTimeInterface $dateCommande;
    public string $montantTotal;
    public EtatCommandeEnum $etat;
    public TypeConsommationEnum $typeConsommation;
    public bool $canCancel;

    public function __construct(
        int $idCommande,
        string $reference,
        \DateTimeInterface $dateCommande,
        string $montantTotal,
        EtatCommandeEnum $etat,
        TypeConsommationEnum $typeConsommation,
        bool $canCancel
    ) {
        $this->idCommande = $idCommande;
        $this->reference = $reference;
        $this->dateCommande = $dateCommande;
        $this->montantTotal = $montantTotal;
        $this->etat = $etat;
        $this->typeConsommation = $typeConsommation;
        $this->canCancel = $canCancel;
    }
}
