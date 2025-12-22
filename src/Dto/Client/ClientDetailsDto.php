<?php

namespace App\Dto\Client;

use App\Dto\Common\PagedResultDto;
use App\Dto\Commande\ClientInfoDto;

class ClientDetailsDto
{
    public ClientInfoDto $client;

    /** @var PagedResultDto<ClientCommandeListItemDto> */
    public PagedResultDto $commandes;

    public function __construct(ClientInfoDto $client, PagedResultDto $commandes)
    {
        $this->client = $client;
        $this->commandes = $commandes;
    }
}
