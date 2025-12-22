<?php

namespace App\Entity;

use App\Enum\ModePaiementEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'paiement')]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_paiement', type: 'integer')]
    private ?int $idPaiement = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $datePaiement;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $montant;

    #[ORM\Column(enumType: ModePaiementEnum::class)]
    private ModePaiementEnum $modePaiement;

    #[ORM\OneToOne(inversedBy: 'paiement', targetEntity: Commande::class)]
    #[ORM\JoinColumn(name: 'id_commande', referencedColumnName: 'id_commande', unique: true, nullable: false)]
    private Commande $commande;

    public function getIdPaiement(): ?int { return $this->idPaiement; }
    public function getDatePaiement(): \DateTimeImmutable { return $this->datePaiement; }
    public function setDatePaiement(\DateTimeImmutable $d): self { $this->datePaiement = $d; return $this; }
    public function getMontant(): string { return $this->montant; }
    public function setMontant(string $m): self { $this->montant = $m; return $this; }
    public function getModePaiement(): ModePaiementEnum { return $this->modePaiement; }
    public function setModePaiement(ModePaiementEnum $m): self { $this->modePaiement = $m; return $this; }
    public function getCommande(): Commande { return $this->commande; }
    public function setCommande(Commande $c): self { $this->commande = $c; return $this; }
}
