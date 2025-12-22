<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'quartier')]
class Quartier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_quartier', type: 'integer')]
    private ?int $idQuartier = null;

    #[ORM\Column(type: 'string', length: 120)]
    private string $libelle;

    #[ORM\ManyToOne(targetEntity: Zone::class, inversedBy: 'quartiers')]
    #[ORM\JoinColumn(name: 'id_zone', referencedColumnName: 'id_zone', nullable: false)]
    private Zone $zone;

    public function getIdQuartier(): ?int { return $this->idQuartier; }
    public function getLibelle(): string { return $this->libelle; }
    public function setLibelle(string $libelle): self { $this->libelle = $libelle; return $this; }
    public function getZone(): Zone { return $this->zone; }
    public function setZone(Zone $zone): self { $this->zone = $zone; return $this; }
}
