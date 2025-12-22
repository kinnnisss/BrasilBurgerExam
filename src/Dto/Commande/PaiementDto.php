<?php

namespace App\Dto\Commande;

use App\Enum\ModePaiementEnum;

class PaiementDto
{
    public \DateTimeInterface $datePaiement;
    public string $montant;
    public ModePaiementEnum $modePaiement;

    public function __construct(\DateTimeInterface $datePaiement, string $montant, ModePaiementEnum $modePaiement)
    {
        $this->datePaiement = $datePaiement;
        $this->montant = $montant;
        $this->modePaiement = $modePaiement;
    }
}
