<?php

namespace App\Service\Impl;

use App\Dto\Catalogue\MenuPriceDto;
use App\Repository\BurgerRepository;
use App\Repository\ComplementRepository;
use App\Service\MenuPriceServiceInterface;

class MenuPriceService implements MenuPriceServiceInterface
{
    public function __construct(
        private readonly BurgerRepository $burgerRepository,
        private readonly ComplementRepository $complementRepository
    ) {}

    private function moneyRound(string $amount): string
    {
        return number_format((float)$amount, 2, '.', '');
    }

    private function moneyMulPercent(string $amount, int $percent): string
    {
        $factor = (string) ($percent / 100);
        if (function_exists('bcmul')) {
            return bcmul($amount, $factor, 4);
        }
        return (string) ((float)$amount * ((float)$percent / 100));
    }

    private function moneyAdd(string $a, string $b): string
    {
        if (function_exists('bcadd')) {
            return bcadd($a, $b, 2);
        }
        return number_format(((float)$a + (float)$b), 2, '.', '');
    }
    public function calculate(int $burgerId, int $fritesId, int $boissonId): MenuPriceDto
    {
        $burger = $this->burgerRepository->findById($burgerId);
        if (!$burger || $burger->isArchived()) {
            throw new \RuntimeException("Burger invalide ou archivé.");
        }

        $frites = $this->complementRepository->findActiveById($fritesId);
        if (!$frites) {
            throw new \RuntimeException("Frites invalides ou archivées.");
        }

        $boisson = $this->complementRepository->findActiveById($boissonId);
        if (!$boisson) {
            throw new \RuntimeException("Boisson invalide ou archivée.");
        }

        $total = $this->moneyAdd(
            $this->moneyAdd((string)$burger->getPrix(), (string)$frites->getPrix()),
            (string)$boisson->getPrix()
        );

        $economyPercent = 15;
        $economyAmount = $this->moneyRound(
            $this->moneyMulPercent($total, $economyPercent)
        );

        return new MenuPriceDto($total, $economyPercent, $economyAmount);
    }

    public function calculateEconomy(MenuPriceDto $base, int $percent): MenuPriceDto
    {
        $p = max(0, min(100, $percent));
        $economyAmount = $this->moneyRound($this->moneyMulPercent($base->total, $p));
        return new MenuPriceDto($base->total, $p, $economyAmount);
    }

}
