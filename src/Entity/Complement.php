<?php

namespace App\Entity;

use App\Enum\TypeComplementEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'complement')]
class Complement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_complement', type: 'integer')]
    private ?int $idComplement = null;

    #[ORM\Column(type: 'string', length: 120)]
    private string $nom;

    #[ORM\Column(enumType: TypeComplementEnum::class)]
    private TypeComplementEnum $typeComplement;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private string $prix;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isArchived = false;

    public function getIdComplement(): ?int { return $this->idComplement; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getTypeComplement(): TypeComplementEnum { return $this->typeComplement; }
    public function setTypeComplement(TypeComplementEnum $t): self { $this->typeComplement = $t; return $this; }
    public function getPrix(): string { return $this->prix; }
    public function setPrix(string $prix): self { $this->prix = $prix; return $this; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }
    public function isArchived(): bool { return $this->isArchived; }
    public function setIsArchived(bool $v): self { $this->isArchived = $v; return $this; }
}
