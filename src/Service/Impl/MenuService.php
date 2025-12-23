<?php

namespace App\Service\Impl;

use App\Dto\Catalogue\MenuCreateDto;
use App\Dto\Catalogue\MenuEditDto;
use App\Dto\Catalogue\MenuFormDataDto;
use App\Dto\Catalogue\MenuUpdateDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;
use App\Entity\Menu;
use App\Enum\TypeComplementEnum;
use App\Repository\BurgerRepository;
use App\Repository\ComplementRepository;
use App\Repository\MenuRepository;
use App\Service\ImageStorageServiceInterface;
use App\Service\MenuPriceServiceInterface;
use App\Service\MenuServiceInterface;

class MenuService implements MenuServiceInterface
{
    public function __construct(
        private readonly MenuRepository $menuRepository,
        private readonly BurgerRepository $burgerRepository,
        private readonly ComplementRepository $complementRepository,
        private readonly ImageStorageServiceInterface $imageStorage,
        private readonly MenuPriceServiceInterface $menuPriceService
    ) {}

    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto
    {
        return $this->menuRepository->search($q, $archived, $page, $pageSize);
    }

}
