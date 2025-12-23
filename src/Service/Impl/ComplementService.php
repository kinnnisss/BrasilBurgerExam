<?php

namespace App\Service\Impl;

use App\Dto\Catalogue\ComplementEditDto;
use App\Dto\Catalogue\ComplementUpsertDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Entity\Complement;
use App\Enum\TypeComplementEnum;
use App\Repository\ComplementRepository;
use App\Service\ComplementServiceInterface;
use App\Service\ImageStorageServiceInterface;

class ComplementService implements ComplementServiceInterface
{
    public function __construct(
        private readonly ComplementRepository $complementRepository,
        private readonly ImageStorageServiceInterface $imageStorage
    ) {}

    public function search(
        ?string $q,
        ?TypeComplementEnum $type,
        ?bool $archived,
        int $page,
        int $pageSize
    ): PagedResultDto {
        return $this->complementRepository->search($q, $type, $archived, $page, $pageSize);
    }

    public function getEditData(int $idComplement): ComplementEditDto
    {
        $c = $this->complementRepository->findById($idComplement);

        if (!$c) {
            throw new \RuntimeException("Complément introuvable (id=$idComplement).");
        }

        return new ComplementEditDto(
            (int) $c->getIdComplement(),
            $c->getNom(),
            $c->getTypeComplement(),
            (string) $c->getPrix(),
            $c->getImage(),
            (bool) $c->isArchived()
        );
    }

    private function isPositiveNumber(string $value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }
        return (float) $value > 0;
    }

    public function create(ComplementUpsertDto $dto): ActionResultDto
    {
        $nom = trim((string) $dto->nom);
        $prix = trim((string) $dto->prix);

        if ($nom === '') {
            return ActionResultDto::fail("Le nom du complément est obligatoire.");
        }

        if (!($dto->type instanceof TypeComplementEnum)) {
            return ActionResultDto::fail("Le type de complément est obligatoire.");
        }

        if (!$this->isPositiveNumber($prix)) {
            return ActionResultDto::fail("Le prix doit être un nombre strictement supérieur à 0.");
        }

        $c = new Complement();
        $c->setNom($nom);
        $c->setTypeComplement($dto->type);
        $c->setPrix($prix);
        $c->setIsArchived(false);

        if ($dto->imageFile !== null) {
            $path = $this->imageStorage->store($dto->imageFile, 'complements');
            $c->setImage($path);
        }

        $id = $this->complementRepository->insert($c);

        return ActionResultDto::ok("Complément créé avec succès.", $id);
    }

}
