<?php

namespace App\Service;

use App\Dto\Commande\CommandeDetailsDto;
use App\Dto\Commande\CommandeListFilterDto;
use App\Dto\Commande\CommandeListItemDto;
use App\Dto\Common\ActionResultDto;
use App\Dto\Common\PagedResultDto;

interface CommandeServiceInterface
{
    /** @return PagedResultDto items = CommandeListItemDto[] */
    public function search(CommandeListFilterDto $filter): PagedResultDto;

    public function getDetails(int $idCommande): CommandeDetailsDto;

    public function cancel(int $idCommande): ActionResultDto;

    public function validate(int $idCommande): ActionResultDto;

    public function terminate(int $idCommande): ActionResultDto;

    public function cancelForClient(int $idClient, int $idCommande): ActionResultDto;
}
