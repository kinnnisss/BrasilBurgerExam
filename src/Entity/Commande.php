<?php

namespace App\Entity;

use App\Enum\EtatCommandeEnum;
use App\Enum\TypeConsommationEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'commande')]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_commande', type: 'integer')]
    private ?int $idCommande = null;

    #[ORM\Column(type: 'string', length: 30, unique: true)]
    private string $reference;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $dateCommande;

    #[ORM\Column(enumType: EtatCommandeEnum::class)]
    private EtatCommandeEnum $etat;

    #[ORM\Column(enumType: TypeConsommationEnum::class)]
    private TypeConsommationEnum $typeConsommation;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $montantTotal;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id_client', nullable: false)]
    private Client $client;

    #[ORM\ManyToOne(targetEntity: Zone::class)]
    #[ORM\JoinColumn(name: 'id_zone', referencedColumnName: 'id_zone', nullable: true)]
    private ?Zone $zone = null;

    #[ORM\ManyToOne(targetEntity: Quartier::class)]
    #[ORM\JoinColumn(name: 'id_quartier', referencedColumnName: 'id_quartier', nullable: true)]
    private ?Quartier $quartier = null;

    #[ORM\ManyToOne(targetEntity: Livreur::class)]
    #[ORM\JoinColumn(name: 'id_livreur', referencedColumnName: 'id_livreur', nullable: true)]
    private ?Livreur $livreur = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: LigneCommande::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $lignes;

    #[ORM\OneToOne(mappedBy: 'commande', targetEntity: Paiement::class, cascade: ['persist', 'remove'])]
    private ?Paiement $paiement = null;

    #[ORM\Column(name: 'date_terminaison', type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $dateTerminaison = null;

    public function __construct()
    {
        $this->lignes = new ArrayCollection();
    }

    public function getIdCommande(): ?int { return $this->idCommande; }
    public function getReference(): string { return $this->reference; }
    public function setReference(string $r): self { $this->reference = $r; return $this; }
    public function getDateCommande(): \DateTimeImmutable { return $this->dateCommande; }
    public function setDateCommande(\DateTimeImmutable $d): self { $this->dateCommande = $d; return $this; }
    public function getEtat(): EtatCommandeEnum { return $this->etat; }
    public function setEtat(EtatCommandeEnum $e): self { $this->etat = $e; return $this; }
    public function getTypeConsommation(): TypeConsommationEnum { return $this->typeConsommation; }
    public function setTypeConsommation(TypeConsommationEnum $t): self { $this->typeConsommation = $t; return $this; }
    public function getMontantTotal(): string { return $this->montantTotal; }
    public function setMontantTotal(string $m): self { $this->montantTotal = $m; return $this; }

    public function getClient(): Client { return $this->client; }
    public function setClient(Client $c): self { $this->client = $c; return $this; }

    public function getZone(): ?Zone { return $this->zone; }
    public function setZone(?Zone $z): self { $this->zone = $z; return $this; }

    public function getQuartier(): ?Quartier { return $this->quartier; }
    public function setQuartier(?Quartier $q): self { $this->quartier = $q; return $this; }

    public function getLivreur(): ?Livreur { return $this->livreur; }
    public function setLivreur(?Livreur $l): self { $this->livreur = $l; return $this; }

    /** @return Collection<int, LigneCommande> */
    public function getLignes(): Collection { return $this->lignes; }

    public function getPaiement(): ?Paiement { return $this->paiement; }
    public function setPaiement(?Paiement $p): self { $this->paiement = $p; return $this; }

    public function getDateTerminaison(): ?\DateTimeImmutable
    {
        return $this->dateTerminaison;
    }

    public function setDateTerminaison(?\DateTimeImmutable $dateTerminaison): self
    {
        $this->dateTerminaison = $dateTerminaison;
        return $this;
    }
}
