<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'zone')]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_zone', type: 'integer')]
    private ?int $idZone = null;

    #[ORM\Column(type: 'string', length: 120)]
    private string $libelle;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $prixLivraison;

    #[ORM\OneToMany(mappedBy: 'zone', targetEntity: Quartier::class)]
    private Collection $quartiers;

    public function __construct()
    {
        $this->quartiers = new ArrayCollection();
    }

    public function getIdZone(): ?int { return $this->idZone; }
    public function getLibelle(): string { return $this->libelle; }
    public function setLibelle(string $libelle): self { $this->libelle = $libelle; return $this; }
    public function getPrixLivraison(): string { return $this->prixLivraison; }
    public function setPrixLivraison(string $prix): self { $this->prixLivraison = $prix; return $this; }

    /** @return Collection<int, Quartier> */
    public function getQuartiers(): Collection { return $this->quartiers; }
}
