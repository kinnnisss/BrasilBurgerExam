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

    public function getCreateData(): MenuFormDataDto
    {
        return new MenuFormDataDto(
            $this->burgerRepository->findActiveForSelect(),
            $this->complementRepository->findActiveForSelectByType(TypeComplementEnum::FRITE),
            $this->complementRepository->findActiveForSelectByType(TypeComplementEnum::BOISSON)
        );
    }

    public function getEditData(int $idMenu): MenuEditDto
    {
        $menu = $this->menuRepository->findById($idMenu);
        if (!$menu) {
            throw new \RuntimeException("Menu introuvable.");
        }

        // Menu fixe attendu : 1 burger + 1 frite + 1 boisson
        $burger = $menu->getBurgers()->first() ?: null;
        $fritesId = null;
        $boissonId = null;

        foreach ($menu->getComplements() as $c) {
            if ($c->getTypeComplement() === TypeComplementEnum::FRITE) $fritesId = (int)$c->getIdComplement();
            if ($c->getTypeComplement() === TypeComplementEnum::BOISSON) $boissonId = (int)$c->getIdComplement();
        }

        if (!$burger || $fritesId === null || $boissonId === null) {
            throw new \RuntimeException("Menu invalide: composition incomplète (burger/frite/boisson).");
        }

        $priceDto = $this->menuPriceService->calculate((int)$burger->getIdBurger(), $fritesId, $boissonId);

        return new MenuEditDto(
            (int)$menu->getIdMenu(),
            $menu->getNom(),
            (int)$burger->getIdBurger(),
            $fritesId,
            $boissonId,
            $priceDto,
            $menu->getImage(),
            (bool)$menu->isArchived()
        );
    }

    public function create(MenuCreateDto $dto): ActionResultDto
    {
        $nom = trim((string)$dto->nom);
        if ($nom === '') {
            return ActionResultDto::fail("Le nom du menu est obligatoire.");
        }

        try {
            $burger = $this->burgerRepository->findById((int)$dto->burgerId);
            if (!$burger || $burger->isArchived()) {
                return ActionResultDto::fail("Burger invalide ou archivé.");
            }

            $frites = $this->complementRepository->findActiveById((int)$dto->fritesId);
            if (!$frites || $frites->getTypeComplement() !== TypeComplementEnum::FRITE) {
                return ActionResultDto::fail("Frites invalides.");
            }

            $boisson = $this->complementRepository->findActiveById((int)$dto->boissonId);
            if (!$boisson || $boisson->getTypeComplement() !== TypeComplementEnum::BOISSON) {
                return ActionResultDto::fail("Boisson invalide.");
            }

            $priceDto = $this->menuPriceService->calculate((int)$dto->burgerId, (int)$dto->fritesId, (int)$dto->boissonId);

            $menu = new Menu();
            $menu->setNom($nom);
            $menu->setPrix($priceDto->total);
            $menu->setIsArchived(false);

            if ($dto->imageFile !== null) {
                $path = $this->imageStorage->store($dto->imageFile, 'menus');
                $menu->setImage($path);
            }

            $menu->getBurgers()->clear();
            $menu->getComplements()->clear();
            $menu->getBurgers()->add($burger);
            $menu->getComplements()->add($frites);
            $menu->getComplements()->add($boisson);

            $id = $this->menuRepository->insert($menu);

            return ActionResultDto::ok("Menu créé avec succès.", $id);

        } catch (\Throwable $e) {
            return ActionResultDto::fail("Erreur création menu: " . $e->getMessage());
        }
    }
    public function update(int $idMenu, MenuUpdateDto $dto): ActionResultDto
    {
        $menu = $this->menuRepository->findById($idMenu);
        if (!$menu) {
            return ActionResultDto::fail("Menu introuvable.");
        }

        $nom = trim((string)$dto->nom);
        if ($nom === '') {
            return ActionResultDto::fail("Le nom du menu est obligatoire.");
        }

        try {
            $burger = $this->burgerRepository->findById((int)$dto->burgerId);
            if (!$burger || $burger->isArchived()) {
                return ActionResultDto::fail("Burger invalide ou archivé.");
            }

            $frites = $this->complementRepository->findActiveById((int)$dto->fritesId);
            if (!$frites || $frites->getTypeComplement() !== TypeComplementEnum::FRITE) {
                return ActionResultDto::fail("Frites invalides.");
            }

            $boisson = $this->complementRepository->findActiveById((int)$dto->boissonId);
            if (!$boisson || $boisson->getTypeComplement() !== TypeComplementEnum::BOISSON) {
                return ActionResultDto::fail("Boisson invalide.");
            }

            $priceDto = $this->menuPriceService->calculate((int)$dto->burgerId, (int)$dto->fritesId, (int)$dto->boissonId);

            $menu->setNom($nom);
            $menu->setPrix($priceDto->total);

            if ($dto->imageFile !== null) {
                $newPath = $this->imageStorage->replace($menu->getImage(), $dto->imageFile, 'menus');
                $menu->setImage($newPath);
            }

            $menu->getBurgers()->clear();
            $menu->getComplements()->clear();
            $menu->getBurgers()->add($burger);
            $menu->getComplements()->add($frites);
            $menu->getComplements()->add($boisson);

            $this->menuRepository->update($menu);

            return ActionResultDto::ok("Menu modifié avec succès.", $idMenu);

        } catch (\Throwable $e) {
            return ActionResultDto::fail("Erreur modification menu: " . $e->getMessage());
        }
    }


}
