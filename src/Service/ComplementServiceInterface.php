<?php

namespace App\Service;

use App\Dto\Catalogue\ComplementEditDto;
use App\Dto\Catalogue\ComplementListItemDto;
use App\Dto\Catalogue\ComplementUpsertDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Enum\TypeComplementEnum;

interface ComplementServiceInterface
{
    /** @return PagedResultDto items = ComplementListItemDto[] */
    public function search(
        ?string $q,
        ?TypeComplementEnum $type,
        ?bool $archived,
        int $page,
        int $pageSize
    ): PagedResultDto;

    public function getEditData(int $idComplement): ComplementEditDto;

    public function create(ComplementUpsertDto $dto): ActionResultDto;

    public function update(int $idComplement, ComplementUpsertDto $dto): ActionResultDto;

    public function archive(int $idComplement): ActionResultDto;

    public function unarchive(int $idComplement): ActionResultDto;

    /** @return SelectItemDto[] */
    public function getSelectComplementsByType(TypeComplementEnum $type): array;
}
