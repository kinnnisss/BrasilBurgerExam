<?php

namespace App\Entity;

use App\Enum\TypeArticleEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ligne_commande')]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_ligne_commande', type: 'integer')]
    private ?int $idLigneCommande = null;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'lignes')]
    #[ORM\JoinColumn(name: 'id_commande', referencedColumnName: 'id_commande', nullable: false)]
    private Commande $commande;

    #[ORM\Column(enumType: TypeArticleEnum::class)]
    private TypeArticleEnum $typeArticle;

    #[ORM\ManyToOne(targetEntity: Burger::class)]
    #[ORM\JoinColumn(name: 'id_burger', referencedColumnName: 'id_burger', nullable: true)]
    private ?Burger $burger = null;

    #[ORM\ManyToOne(targetEntity: Menu::class)]
    #[ORM\JoinColumn(name: 'id_menu', referencedColumnName: 'id_menu', nullable: true)]
    private ?Menu $menu = null;

    #[ORM\ManyToOne(targetEntity: Complement::class)]
    #[ORM\JoinColumn(name: 'id_complement', referencedColumnName: 'id_complement', nullable: true)]
    private ?Complement $complement = null;

    #[ORM\Column(type: 'integer')]
    private int $quantite;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $prixUnitaire;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $prixTotal;

    // getters/setters (court)
    public function getIdLigneCommande(): ?int { return $this->idLigneCommande; }
    public function getCommande(): Commande { return $this->commande; }
    public function setCommande(Commande $c): self { $this->commande = $c; return $this; }
    public function getTypeArticle(): TypeArticleEnum { return $this->typeArticle; }
    public function setTypeArticle(TypeArticleEnum $t): self { $this->typeArticle = $t; return $this; }

    public function getBurger(): ?Burger { return $this->burger; }
    public function setBurger(?Burger $b): self { $this->burger = $b; return $this; }
    public function getMenu(): ?Menu { return $this->menu; }
    public function setMenu(?Menu $m): self { $this->menu = $m; return $this; }
    public function getComplement(): ?Complement { return $this->complement; }
    public function setComplement(?Complement $c): self { $this->complement = $c; return $this; }

    public function getQuantite(): int { return $this->quantite; }
    public function setQuantite(int $q): self { $this->quantite = $q; return $this; }
    public function getPrixUnitaire(): string { return $this->prixUnitaire; }
    public function setPrixUnitaire(string $p): self { $this->prixUnitaire = $p; return $this; }
    public function getPrixTotal(): string { return $this->prixTotal; }
    public function setPrixTotal(string $p): self { $this->prixTotal = $p; return $this; }
}
