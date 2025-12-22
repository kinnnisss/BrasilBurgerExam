<?php

namespace App\Service;

use App\Dto\Client\ClientCommandeFilterDto;
use App\Dto\Client\ClientDetailsDto;
use App\Dto\Client\ClientFilterDto;
use App\Dto\Client\ClientListItemDto;
use App\Dto\Common\PagedResultDto;

interface ClientServiceInterface
{
    /** @return PagedResultDto items = ClientListItemDto[] */
    public function search(ClientFilterDto $filter): PagedResultDto;

    public function getDetails(int $idClient, ClientCommandeFilterDto $filter): ClientDetailsDto;
}
