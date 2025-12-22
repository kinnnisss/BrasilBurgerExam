<?php

namespace App\Service\Impl;

use App\Dto\Client\ClientCommandeFilterDto;
use App\Dto\Client\ClientDetailsDto;
use App\Dto\Client\ClientFilterDto;
use App\Dto\Commande\ClientInfoDto;
use App\Dto\Common\PagedResultDto;
use App\Repository\ClientCommandeRepository;
use App\Repository\ClientRepository;
use App\Service\ClientServiceInterface;

class ClientService implements ClientServiceInterface
{
    public function __construct(
        private readonly ClientRepository $clientRepository,
        private readonly ClientCommandeRepository $clientCommandeRepository
    ) {}

    public function search(ClientFilterDto $filter): PagedResultDto
    {
        return $this->clientRepository->search($filter);
    }

}
