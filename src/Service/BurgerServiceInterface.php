<?php

namespace App\Service;

use App\Dto\Catalogue\BurgerEditDto;
use App\Dto\Catalogue\BurgerListItemDto;
use App\Dto\Catalogue\BurgerUpsertDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;

interface BurgerServiceInterface
{
    /** @return PagedResultDto items = BurgerListItemDto[] */
    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto;

    public function getEditData(int $idBurger): BurgerEditDto;

    public function create(BurgerUpsertDto $dto): ActionResultDto;

    public function update(int $idBurger, BurgerUpsertDto $dto): ActionResultDto;

    public function archive(int $idBurger): ActionResultDto;

    public function unarchive(int $idBurger): ActionResultDto;

    /** @return SelectItemDto[] */
    public function getSelectActiveBurgers(): array;
}
