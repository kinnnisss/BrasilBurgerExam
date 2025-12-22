<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'menu')]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_menu', type: 'integer')]
    private ?int $idMenu = null;

    #[ORM\Column(type: 'string', length: 120)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $prix;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isArchived = false;

    #[ORM\ManyToMany(targetEntity: Burger::class)]
    #[ORM\JoinTable(name: 'menu_burger')]
    #[ORM\JoinColumn(name: 'id_menu', referencedColumnName: 'id_menu')]
    #[ORM\InverseJoinColumn(name: 'id_burger', referencedColumnName: 'id_burger')]
    private Collection $burgers;

    #[ORM\ManyToMany(targetEntity: Complement::class)]
    #[ORM\JoinTable(name: 'menu_complement')]
    #[ORM\JoinColumn(name: 'id_menu', referencedColumnName: 'id_menu')]
    #[ORM\InverseJoinColumn(name: 'id_complement', referencedColumnName: 'id_complement')]
    private Collection $complements;

    public function __construct()
    {
        $this->burgers = new ArrayCollection();
        $this->complements = new ArrayCollection();
    }

    public function getIdMenu(): ?int { return $this->idMenu; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }
    public function getPrix(): string { return $this->prix; }
    public function setPrix(string $prix): self { $this->prix = $prix; return $this; }
    public function isArchived(): bool { return $this->isArchived; }
    public function setIsArchived(bool $v): self { $this->isArchived = $v; return $this; }

    /** @return Collection<int, Burger> */
    public function getBurgers(): Collection { return $this->burgers; }

    /** @return Collection<int, Complement> */
    public function getComplements(): Collection { return $this->complements; }
}
