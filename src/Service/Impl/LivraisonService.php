<?php

namespace App\Service\Impl;

use App\Dto\Common\ActionResultDto;
use App\Dto\Livraison\LivraisonAssignDto;
use App\Dto\Livraison\LivraisonBoardDto;
use App\Dto\Livraison\LivraisonCommandeDto;
use App\Dto\Livraison\LivraisonFilterDataDto;
use App\Dto\Livraison\LivraisonFilterDto;
use App\Dto\Livraison\LivraisonZoneDto;
use App\Dto\Livraison\LivreurMiniDto;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use App\Repository\ZoneRepository;
use App\Service\LivraisonServiceInterface;

class LivraisonService implements LivraisonServiceInterface
{
    public function __construct(
        private readonly LivraisonRepository $livraisonRepository,
        private readonly ZoneRepository $zoneRepository,
        private readonly LivreurRepository $livreurRepository
    ) {}

    public function getFilterData(): LivraisonFilterDataDto
    {
        return new LivraisonFilterDataDto(
            $this->zoneRepository->findAllForSelect(),
            $this->livreurRepository->findAllForSelect()
        );
    }

    private function moneyAdd(string $a, string $b): string
    {
        if (function_exists('bcadd')) {
            return bcadd($a, $b, 2);
        }
        return number_format(((float)$a + (float)$b), 2, '.', '');
    }

    public function getBoard(LivraisonFilterDto $filter): LivraisonBoardDto
    {
        $rows = $this->livraisonRepository->findLivraisonsRaw($filter);

        $group = [];

        foreach ($rows as $r) {
            $zoneId = $r->idZone ?? 0;
            $zoneLib = $r->zoneLibelle ?? 'Sans zone';

            if (!isset($group[$zoneId])) {
                $group[$zoneId] = [
                    'zoneId' => (int)$zoneId,
                    'zoneLibelle' => (string)$zoneLib,
                    'nb' => 0,
                    'montantTotal' => '0.00',
                    'commandes' => [],
                ];
            }

            $group[$zoneId]['nb']++;

            $group[$zoneId]['montantTotal'] = $this->moneyAdd(
                $group[$zoneId]['montantTotal'],
                (string)$r->montantTotal
            );

            $livreurMini = null;
            if ($r->idLivreur !== null) {
                $livreurMini = new LivreurMiniDto(
                    (int)$r->idLivreur,
                    (string)$r->getLivreurNomComplet(),
                    (string)$r->livreurTelephone
                );
            }

            $group[$zoneId]['commandes'][] = new LivraisonCommandeDto(
                (int)$r->idCommande,
                $r->reference,
                $r->getClientNomComplet(),
                $r->clientTelephone,
                $r->quartierLibelle,
                (string)$r->montantTotal,
                $r->etat,
                $livreurMini
            );
        }

        $zones = [];
        foreach ($group as $z) {
            $zones[] = new LivraisonZoneDto(
                $z['zoneId'],
                $z['zoneLibelle'],
                $z['nb'],
                $z['montantTotal'],
                $z['commandes']
            );
        }

        return new LivraisonBoardDto($zones);
    }


    public function assignLivreur(int $idCommande, LivraisonAssignDto $dto): ActionResultDto
    {
        $livreurId = (int)$dto->livreurId;

        $livreur = $this->livreurRepository->findById($livreurId);
        if ($livreur === null) {
            return ActionResultDto::fail("Livreur introuvable.");
        }

        $ok = $this->livraisonRepository->assignLivreur($idCommande, $livreurId);

        return $ok
            ? ActionResultDto::ok("Livreur affecté.")
            : ActionResultDto::fail("Impossible d'affecter ce livreur (commande non affectable).");
    }

    public function assignLivreurToZone(int $idZone, LivraisonAssignDto $dto): ActionResultDto
    {
        $livreurId = (int)$dto->livreurId;

        $livreur = $this->livreurRepository->findById($livreurId);
        if ($livreur === null) {
            return ActionResultDto::fail("Livreur introuvable.");
        }

        if (!$this->livraisonRepository->isLivreurDisponible($livreurId)) {
            return ActionResultDto::fail("Livreur indisponible (déjà affecté à une commande validée).");
        }

        $nb = $this->livraisonRepository->assignLivreurToZoneValidated($idZone, $livreurId);

        return $nb > 0
            ? ActionResultDto::ok("Livreur affecté à $nb commande(s) validée(s) de la zone.")
            : ActionResultDto::fail("Aucune commande validée disponible dans cette zone.");
    }

}
