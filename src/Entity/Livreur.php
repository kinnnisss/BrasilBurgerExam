<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'livreur')]
class Livreur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_livreur', type: 'integer')]
    private ?int $idLivreur = null;

    #[ORM\Column(type: 'string', length: 80)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 80)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 20)]
    private string $telephone;

    public function getIdLivreur(): ?int { return $this->idLivreur; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getTelephone(): string { return $this->telephone; }
    public function setTelephone(string $telephone): self { $this->telephone = $telephone; return $this; }
}
