<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'client')]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_client', type: 'integer')]
    private ?int $idClient = null;

    #[ORM\Column(type: 'string', length: 80)]
    private string $nom;

    #[ORM\Column(type: 'string', length: 80)]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 20, unique: true)]
    private string $telephone;

    #[ORM\Column(type: 'string', length: 60, unique: true)]
    private string $login;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Commande::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getIdClient(): ?int { return $this->idClient; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getTelephone(): string { return $this->telephone; }
    public function setTelephone(string $telephone): self { $this->telephone = $telephone; return $this; }
    public function getLogin(): string { return $this->login; }
    public function setLogin(string $login): self { $this->login = $login; return $this; }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }

    /** @return Collection<int, Commande> */
    public function getCommandes(): Collection { return $this->commandes; }
}
