<?php

namespace App\Dto\Common;

class AuthResultDto
{
    public bool $success;
    public string $message;
    public ?int $gestionnaireId;

    public function __construct(bool $success = true, string $message = '', ?int $gestionnaireId = null)
    {
        $this->success = $success;
        $this->message = $message;
        $this->gestionnaireId = $gestionnaireId;
    }

    public static function ok(int $gestionnaireId, string $message = ''): self
    {
        return new self(true, $message, $gestionnaireId);
    }

    public static function fail(string $message): self
    {
        return new self(false, $message, null);
    }
}
