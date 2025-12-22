<?php

namespace App\Service;

use App\Dto\Catalogue\MenuPriceDto;

interface MenuPriceServiceInterface
{
    public function calculate(int $burgerId, int $fritesId, int $boissonId): MenuPriceDto;

    public function calculateEconomy(MenuPriceDto $base, int $percent): MenuPriceDto;
}
