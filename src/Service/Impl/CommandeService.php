<?php

namespace App\Service\Impl;

use App\Dto\Commande\CommandeActionsDto;
use App\Enum\EtatCommandeEnum;
use App\Repository\CommandeRepository;
use App\Repository\PaiementRepository;
use App\Service\CommandeServiceInterface;

class CommandeService implements CommandeServiceInterface
{
    public function __construct(
        private readonly CommandeRepository $commandeRepository,
        private readonly PaiementRepository $paiementRepository
    ) {}

    private function computeActions(EtatCommandeEnum $etat): CommandeActionsDto
    {
        $canValidate = ($etat === EtatCommandeEnum::ENCOURS);
        $canTerminate = ($etat === EtatCommandeEnum::VALIDEE);
        $canCancel = in_array($etat, [EtatCommandeEnum::ENCOURS, EtatCommandeEnum::VALIDEE], true);

        return new CommandeActionsDto(
            $canCancel,
            $canValidate,
            $canTerminate
        );
    }
}
