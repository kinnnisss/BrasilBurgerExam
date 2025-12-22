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

    public function getEditData(int $idBurger): BurgerEditDto
    {
        $burger = $this->burgerRepository->findById($idBurger);

        if (!$burger) {
            // On reste strict : le controller gère 404
            throw new \RuntimeException("Burger introuvable (id=$idBurger).");
        }

        return new BurgerEditDto(
            (int) $burger->getIdBurger(),
            $burger->getNom(),
            (string) $burger->getPrix(),
            $burger->getImage(),
            (bool) $burger->isArchived()
        );
    }

}
