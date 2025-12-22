<?php

namespace App\Dto\Catalogue;

class MenuPriceDto
{
    public string $total;
    public int $economyPercent;
    public string $economyAmount;

    public function __construct(string $total, int $economyPercent, string $economyAmount)
    {
        $this->total = $total;
        $this->economyPercent = $economyPercent;
        $this->economyAmount = $economyAmount;
    }
}
