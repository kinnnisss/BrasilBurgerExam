<?php

namespace App\Dto\Livraison;

use App\Enum\EtatCommandeEnum;

class LivraisonCommandeDto
{
    public int $idCommande;
    public string $reference;
    public string $clientNom;
    public string $clientTelephone;
    public ?string $quartier;
    public string $montant;
    public EtatCommandeEnum $etat;
    public ?LivreurMiniDto $livreur;

    public function __construct(
        int $idCommande,
        string $reference,
        string $clientNom,
        string $clientTelephone,
        ?string $quartier,
        string $montant,
        EtatCommandeEnum $etat,
        ?LivreurMiniDto $livreur
    ) {
        $this->idCommande = $idCommande;
        $this->reference = $reference;
        $this->clientNom = $clientNom;
        $this->clientTelephone = $clientTelephone;
        $this->quartier = $quartier;
        $this->montant = $montant;
        $this->etat = $etat;
        $this->livreur = $livreur;
    }
}
