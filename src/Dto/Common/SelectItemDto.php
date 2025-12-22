<?php

namespace App\Dto\Common;

class SelectItemDto
{
    public int $id;
    public string $label;

    public function __construct(int $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }
}
