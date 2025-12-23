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

}
