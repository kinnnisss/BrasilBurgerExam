<?php

namespace App\Dto\Common;

class PagedResultDto
{
    /** @var array<int, mixed> */
    public array $items = [];

    public int $page = 1;
    public int $pageSize = 20;

    public int $totalItems = 0;
    public int $totalPages = 0;

    /**
     * @param array<int, mixed> $items
     */
    public function __construct(array $items, int $page, int $pageSize, int $totalItems)
    {
        $this->items = $items;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->totalItems = $totalItems;

        $this->totalPages = (int) max(1, (int) ceil($totalItems / max(1, $pageSize)));
    }
}
