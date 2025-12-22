<?php

namespace App\Dto\Commande;

class CommandeActionsDto
{
    public bool $canCancel;
    public bool $canValidate;
    public bool $canTerminate;

    public function __construct(bool $canCancel, bool $canValidate, bool $canTerminate)
    {
        $this->canCancel = $canCancel;
        $this->canValidate = $canValidate;
        $this->canTerminate = $canTerminate;
    }
}
