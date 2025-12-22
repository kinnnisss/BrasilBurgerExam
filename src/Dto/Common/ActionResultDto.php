<?php

namespace App\Dto\Common;

class ActionResultDto
{
    public bool $success;
    public string $message;
    public ?int $id;

    public function __construct(bool $success = true, string $message = '', ?int $id = null)
    {
        $this->success = $success;
        $this->message = $message;
        $this->id = $id;
    }

    public static function ok(string $message = '', ?int $id = null): self
    {
        return new self(true, $message, $id);
    }

    public static function fail(string $message): self
    {
        return new self(false, $message, null);
    }
}
