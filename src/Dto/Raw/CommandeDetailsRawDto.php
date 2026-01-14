<?php

namespace App\Dto\Raw;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeConsommationEnum;
use App\Enum\ModePaiementEnum;

class CommandeDetailsRawDto
{
    public int $idCommande;
    public string $reference;
    public \DateTimeInterface $dateCommande;
    public EtatCommandeEnum $etat;
    public TypeConsommationEnum $typeConsommation;
    public string $montantTotal;

    public int $idClient;
    public string $clientNom;
    public string $clientPrenom;
    public string $clientTelephone;
    public string $clientLogin;

    public ?int $idZone;
    public ?string $zoneLibelle;

    public ?int $idQuartier;
    public ?string $quartierLibelle;

    public ?int $idLivreur;
    public ?string $livreurNom;
    public ?string $livreurPrenom;
    public ?string $livreurTelephone;

    public ?int $idPaiement;
    public ?\DateTimeInterface $datePaiement;
    public ?string $montantPaiement;
    public ?ModePaiementEnum $modePaiement;

    public ?\DateTimeInterface $dateValidation;
    public ?\DateTimeInterface $dateAnnulation;
    public ?\DateTimeInterface $dateMajEtat;
    public ?\DateTimeInterface $dateTerminaison;

    public function __construct(
        int $idCommande,
        string $reference,
        \DateTimeInterface $dateCommande,
        EtatCommandeEnum $etat,
        TypeConsommationEnum $typeConsommation,
        string $montantTotal,

        int $idClient,
        string $clientNom,
        string $clientPrenom,
        string $clientTelephone,
        string $clientLogin,

        ?int $idZone,
        ?string $zoneLibelle,
        ?int $idQuartier,
        ?string $quartierLibelle,
        ?int $idLivreur,
        ?string $livreurNom,
        ?string $livreurPrenom,
        ?string $livreurTelephone,

        ?int $idPaiement,
        ?\DateTimeInterface $datePaiement,
        ?string $montantPaiement,
        ?ModePaiementEnum $modePaiement,
        ?\DateTimeInterface $dateValidation,
        ?\DateTimeInterface $dateAnnulation,
        ?\DateTimeInterface $dateMajEtat,
        ?\DateTimeInterface $dateTerminaison

    ) {
        $this->idCommande = $idCommande;
        $this->reference = $reference;
        $this->dateCommande = $dateCommande;
        $this->etat = $etat;
        $this->typeConsommation = $typeConsommation;
        $this->montantTotal = $montantTotal;

        $this->idClient = $idClient;
        $this->clientNom = $clientNom;
        $this->clientPrenom = $clientPrenom;
        $this->clientTelephone = $clientTelephone;
        $this->clientLogin = $clientLogin;

        $this->idZone = $idZone;
        $this->zoneLibelle = $zoneLibelle;

        $this->idQuartier = $idQuartier;
        $this->quartierLibelle = $quartierLibelle;

        $this->idLivreur = $idLivreur;
        $this->livreurNom = $livreurNom;
        $this->livreurPrenom = $livreurPrenom;
        $this->livreurTelephone = $livreurTelephone;

        $this->idPaiement = $idPaiement;
        $this->datePaiement = $datePaiement;
        $this->montantPaiement = $montantPaiement;
        $this->modePaiement = $modePaiement;

        $this->dateValidation = $dateValidation;
        $this->dateAnnulation = $dateAnnulation;
        $this->dateMajEtat = $dateMajEtat;
        $this->dateTerminaison = $dateTerminaison;

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
