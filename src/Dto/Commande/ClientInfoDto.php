<?php

namespace App\Dto\Commande;

class ClientInfoDto
{
    public int $id;
    public string $nomComplet;
    public string $telephone;
    public string $login;

    public function __construct(int $id, string $nomComplet, string $telephone, string $login)
    {
        $this->id = $id;
        $this->nomComplet = $nomComplet;
        $this->telephone = $telephone;
        $this->login = $login;
    }
}
