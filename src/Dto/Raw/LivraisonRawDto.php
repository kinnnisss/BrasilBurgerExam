<?php

namespace App\Dto\Raw;

use App\Enum\EtatCommandeEnum;

class LivraisonRawDto
{
    public int $idCommande;
    public string $reference;
    public \DateTimeInterface $dateCommande;
    public EtatCommandeEnum $etat;
    public string $montantTotal;

    public int $idClient;
    public string $clientNom;
    public string $clientPrenom;
    public string $clientTelephone;

    public ?int $idZone;
    public ?string $zoneLibelle;

    public ?int $idQuartier;
    public ?string $quartierLibelle;

    public ?int $idLivreur;
    public ?string $livreurNom;
    public ?string $livreurPrenom;
    public ?string $livreurTelephone;

    public function __construct(
        int $idCommande,
        string $reference,
        \DateTimeInterface $dateCommande,
        EtatCommandeEnum $etat,
        string $montantTotal,

        int $idClient,
        string $clientNom,
        string $clientPrenom,
        string $clientTelephone,

        ?int $idZone,
        ?string $zoneLibelle,
        ?int $idQuartier,
        ?string $quartierLibelle,

        ?int $idLivreur,
        ?string $livreurNom,
        ?string $livreurPrenom,
        ?string $livreurTelephone
    ) {
        $this->idCommande = $idCommande;
        $this->reference = $reference;
        $this->dateCommande = $dateCommande;
        $this->etat = $etat;
        $this->montantTotal = $montantTotal;

        $this->idClient = $idClient;
        $this->clientNom = $clientNom;
        $this->clientPrenom = $clientPrenom;
        $this->clientTelephone = $clientTelephone;

        $this->idZone = $idZone;
        $this->zoneLibelle = $zoneLibelle;

        $this->idQuartier = $idQuartier;
        $this->quartierLibelle = $quartierLibelle;

        $this->idLivreur = $idLivreur;
        $this->livreurNom = $livreurNom;
        $this->livreurPrenom = $livreurPrenom;
        $this->livreurTelephone = $livreurTelephone;
    }

    public function getClientNomComplet(): string
    {
        return trim($this->clientNom . ' ' . $this->clientPrenom);
    }

    public function getLivreurNomComplet(): ?string
    {
        if ($this->livreurNom === null || $this->livreurPrenom === null) {
            return null;
        }
        return trim($this->livreurNom . ' ' . $this->livreurPrenom);
    }
}
