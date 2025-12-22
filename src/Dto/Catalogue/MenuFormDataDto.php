<?php

namespace App\Dto\Catalogue;

use App\Dto\Common\SelectItemDto;

class MenuFormDataDto
{
    /** @var SelectItemDto[] */
    public array $burgers = [];

    /** @var SelectItemDto[] */
    public array $frites = [];

    /** @var SelectItemDto[] */
    public array $boissons = [];

    /**
     * @param SelectItemDto[] $burgers
     * @param SelectItemDto[] $frites
     * @param SelectItemDto[] $boissons
     */
    public function __construct(array $burgers, array $frites, array $boissons)
    {
        $this->burgers = $burgers;
        $this->frites = $frites;
        $this->boissons = $boissons;
    }
}
