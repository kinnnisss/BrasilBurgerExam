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
}
