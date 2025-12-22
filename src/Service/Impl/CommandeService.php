<?php

namespace App\Service\Impl;

use App\Dto\Common\{ActionResultDto, PagedResultDto};
use App\Dto\Commande\{CommandeActionsDto, CommandeListFilterDto, CommandeDetailsDto, CommandeHeaderDto, LigneCommandeDto, PaiementDto, ClientInfoDto};
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

    public function search(CommandeListFilterDto $filter): PagedResultDto
    {
        return $this->commandeRepository->searchForList($filter);
    }
    public function getDetails(int $idCommande): CommandeDetailsDto
    {
        $raw = $this->commandeRepository->findDetailsById($idCommande);
        if ($raw === null) {
            throw new \RuntimeException("Commande introuvable.");
        }

        /** @var LigneCommandeDto[] $lignes */
        $lignes = $this->commandeRepository->findLignesByCommande($idCommande);

        $paiementDto = null;
        if ($raw->idPaiement !== null) {
            $paiementDto = new PaiementDto(
                $raw->datePaiement,
                (string) $raw->montantPaiement,
                $raw->modePaiement
            );
        } else {
            $p = $this->paiementRepository->findByCommandeId($idCommande);
            if ($p !== null) {
                $paiementDto = new PaiementDto(
                    $p->getDatePaiement(),
                    (string) $p->getMontant(),
                    $p->getModePaiement()
                );
            }
        }

        $header = new CommandeHeaderDto(
            $raw->idCommande,
            $raw->reference,
            $raw->dateCommande,
            $raw->etat,
            $raw->typeConsommation,
            (string) $raw->montantTotal,
            $raw->zoneLibelle,
            $raw->quartierLibelle,
            $raw->getLivreurNomComplet()
        );

        $client = new ClientInfoDto(
            $raw->idClient,
            $raw->getClientNomComplet(),
            $raw->clientTelephone,
            $raw->clientLogin
        );

        $actions = $this->computeActions($raw->etat);

        return new CommandeDetailsDto(
            $header,
            $client,
            $lignes,
            $paiementDto,
            $actions
        );
    }
    public function cancel(int $idCommande): ActionResultDto
    {
        $cmd = $this->commandeRepository->findById($idCommande);
        if ($cmd === null) {
            return ActionResultDto::fail("Commande introuvable.");
        }

        $etat = $cmd->getEtat();

        if (!in_array($etat, [EtatCommandeEnum::ENCOURS, EtatCommandeEnum::VALIDEE], true)) {
            return ActionResultDto::fail("Cette commande ne peut plus être annulée.");
        }

        $ok = $this->commandeRepository->updateEtat($idCommande, EtatCommandeEnum::ANNULEE);

        return $ok
            ? ActionResultDto::ok("Commande annulée.")
            : ActionResultDto::fail("Impossible d'annuler la commande.");
    }

    public function validate(int $idCommande): ActionResultDto
    {
        $cmd = $this->commandeRepository->findById($idCommande);
        if ($cmd === null) {
            return ActionResultDto::fail("Commande introuvable.");
        }

        if ($cmd->getEtat() !== EtatCommandeEnum::ENCOURS) {
            return ActionResultDto::fail("Seule une commande ENCOURS peut être validée.");
        }

        $ok = $this->commandeRepository->updateEtat($idCommande, EtatCommandeEnum::VALIDEE);

        return $ok
            ? ActionResultDto::ok("Commande validée.")
            : ActionResultDto::fail("Impossible de valider la commande.");
    }

        public function terminate(int $idCommande): ActionResultDto
    {
        $cmd = $this->commandeRepository->findById($idCommande);
        if ($cmd === null) {
            return ActionResultDto::fail("Commande introuvable.");
        }

        if ($cmd->getEtat() !== EtatCommandeEnum::VALIDEE) {
            return ActionResultDto::fail("Seule une commande VALIDEE peut être terminée.");
        }

        $ok = $this->commandeRepository->updateEtat($idCommande, EtatCommandeEnum::TERMINER);

        return $ok
            ? ActionResultDto::ok("Commande terminée.")
            : ActionResultDto::fail("Impossible de terminer la commande.");
    }
}
