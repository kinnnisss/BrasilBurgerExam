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

    private function isPositiveNumber(string $value): bool
    {
        if (!is_numeric($value)) return false;
        return (float) $value > 0;
    }
    /** @return SelectItemDto[] */
    public function getSelectActiveBurgers(): array
    {
        return $this->burgerRepository->findActiveForSelect();
    }

    public function create(BurgerUpsertDto $dto): ActionResultDto
    {
        $nom = trim((string) $dto->nom);
        $prix = trim((string) $dto->prix);

        if ($nom === '') {
            return ActionResultDto::fail("Le nom du burger est obligatoire.");
        }

        if (!$this->isPositiveNumber($prix)) {
            return ActionResultDto::fail("Le prix doit être un nombre strictement supérieur à 0.");
        }

        $burger = new Burger();
        $burger->setNom($nom);
        $burger->setPrix($prix);
        $burger->setIsArchived(false);

        if ($dto->imageFile !== null) {
            $path = $this->imageStorage->store($dto->imageFile, 'burgers');
            $burger->setImage($path);
        }

        $id = $this->burgerRepository->insert($burger);

        return ActionResultDto::ok("Burger créé avec succès.", $id);
    }

    public function update(int $idBurger, BurgerUpsertDto $dto): ActionResultDto
    {
        $burger = $this->burgerRepository->findById($idBurger);

        if (!$burger) {
            return ActionResultDto::fail("Burger introuvable.");
        }

        $nom = trim((string) $dto->nom);
        $prix = trim((string) $dto->prix);

        if ($nom === '') {
            return ActionResultDto::fail("Le nom du burger est obligatoire.");
        }

        if (!$this->isPositiveNumber($prix)) {
            return ActionResultDto::fail("Le prix doit être un nombre strictement supérieur à 0.");
        }

        $burger->setNom($nom);
        $burger->setPrix($prix);

        if ($dto->imageFile !== null) {
            $newPath = $this->imageStorage->replace($burger->getImage(), $dto->imageFile, 'burgers');
            $burger->setImage($newPath);
        }

        $this->burgerRepository->update($burger);

        return ActionResultDto::ok("Burger modifié avec succès.", $idBurger);
    }

    public function archive(int $idBurger): ActionResultDto
    {
        $ok = $this->burgerRepository->setArchived($idBurger, true);
        return $ok
            ? ActionResultDto::ok("Burger archivé.")
            : ActionResultDto::fail("Burger introuvable.");
    }

}
