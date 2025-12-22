<?php

namespace App\Service\Impl;

use App\Dto\Catalogue\BurgerEditDto;
use App\Dto\Catalogue\BurgerUpsertDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Entity\Burger;
use App\Repository\BurgerRepository;
use App\Service\BurgerServiceInterface;
use App\Service\ImageStorageServiceInterface;

class BurgerService implements BurgerServiceInterface
{
    public function __construct(
        private readonly BurgerRepository $burgerRepository,
        private readonly ImageStorageServiceInterface $imageStorage
    ) {}

    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto
    {
        return $this->burgerRepository->search($q, $archived, $page, $pageSize);
    }

}
