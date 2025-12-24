<?php

namespace App\Service;

use App\Dto\Catalogue\MenuCreateDto;
use App\Dto\Catalogue\MenuEditDto;
use App\Dto\Catalogue\MenuFormDataDto;
use App\Dto\Catalogue\MenuListItemDto;
use App\Dto\Catalogue\MenuUpdateDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;

interface MenuServiceInterface
{
    /** @return PagedResultDto items = MenuListItemDto[] */
    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto;

    public function getCreateData(): MenuFormDataDto;

    public function getEditData(int $idMenu): MenuEditDto;

    public function create(MenuCreateDto $dto): ActionResultDto;

    public function update(int $idMenu, MenuUpdateDto $dto): ActionResultDto;

    public function archive(int $idMenu): ActionResultDto;

    public function unarchive(int $idMenu): ActionResultDto;
    public function findEntitiesByIds(array $ids): array;

}
