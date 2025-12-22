<?php

namespace App\Dto\Commande;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeConsommationEnum;

class CommandeHeaderDto
{
    public int $id;
    public string $reference;
    public \DateTimeInterface $dateCommande;
    public EtatCommandeEnum $etat;
    public TypeConsommationEnum $typeConsommation;
    public string $montantTotal;
    public ?string $zone;
    public ?string $quartier;
    public ?string $livreur;

    public function __construct(
        int $id,
        string $reference,
        \DateTimeInterface $dateCommande,
        EtatCommandeEnum $etat,
        TypeConsommationEnum $typeConsommation,
        string $montantTotal,
        ?string $zone,
        ?string $quartier,
        ?string $livreur
    ) {
        $this->id = $id;
        $this->reference = $reference;
        $this->dateCommande = $dateCommande;
        $this->etat = $etat;
        $this->typeConsommation = $typeConsommation;
        $this->montantTotal = $montantTotal;
        $this->zone = $zone;
        $this->quartier = $quartier;
        $this->livreur = $livreur;
    }
}
