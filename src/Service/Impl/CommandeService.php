<?php

namespace App\Service\Impl;

use App\Dto\Common\ActionResultDto;
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
    public function cancelForClient(int $idClient, int $idCommande): ActionResultDto
    {
        if (!$this->commandeRepository->belongsToClient($idCommande, $idClient)) {
            return ActionResultDto::fail("Cette commande n'appartient pas à ce client.");
        }

        return $this->cancel($idCommande);
    }

}
