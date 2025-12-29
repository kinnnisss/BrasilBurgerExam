<?php

namespace App\Controller;

use App\Dto\Livraison\LivraisonAssignDto;
use App\Dto\Livraison\LivraisonFilterDto;
use App\Form\Livraison\AssignLivreurFormType;
use App\Form\Livraison\LivraisonFilterFormType;
use App\Service\LivraisonServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class LivraisonController extends AbstractController
{
    public function __construct(
        private readonly LivraisonServiceInterface $livraisonService
    ) {}

    #[Route('/gestionnaire/livraisons', name: 'livraison_board', methods: ['GET'])]
    public function board(Request $request): Response
    {
        $filter = new LivraisonFilterDto();
        $filter->page = (int) $request->query->get('page', 1);
        $filter->pageSize = 200;

        $filterData = $this->livraisonService->getFilterData();

        $form = $this->createForm(LivraisonFilterFormType::class, $filter, [
            'method' => 'GET',
            'csrf_protection' => false,
            'choices_zones' => $filterData->zones,
            'choices_livreurs' => $filterData->livreurs,
        ]);
        $form->handleRequest($request);

        $board = $this->livraisonService->getBoard($filter);
        $lockedZones = [];
        $busyLivreurs = [];

        foreach ($board->zones as $zone) {
            $zoneId = (int) $zone->zoneId;

            foreach ($zone->commandes as $c) {
                $etat = is_object($c->etat) ? $c->etat->value : (string) $c->etat;

                if ($etat !== \App\Enum\EtatCommandeEnum::VALIDEE->value) {
                    continue;
                }

                if (!empty($c->livreur) && !empty($c->livreur->id)) {
                    $livreurId = (int) $c->livreur->id;
                    $busyLivreurs[$livreurId] = true;

                    if (!isset($lockedZones[$zoneId])) {
                        $lockedZones[$zoneId] = $livreurId;
                    } elseif ($lockedZones[$zoneId] !== $livreurId) {
                        $lockedZones[$zoneId] = -1;
                    }
                }
            }
        }

        return $this->render('livraison/board.html.twig', [
            'form' => $form->createView(),
            'board' => $board,
            'filterData' => $filterData,
            'lockedZones' => $lockedZones,
            'busyLivreurs' => $busyLivreurs,
        ]);
    }

    #[Route('/gestionnaire/livraisons/{idCommande}/assign', name: 'livraison_assign', requirements: ['idCommande' => '\d+'], methods: ['POST'])]
    public function assign(int $idCommande, Request $request): Response
    {
        $dto = new LivraisonAssignDto();

        $filterData = $this->livraisonService->getFilterData();

        $form = $this->createForm(AssignLivreurFormType::class, $dto, [
            'livreurs' => $filterData->livreurs,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->livraisonService->assignLivreur($idCommande, $dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        } else {
            $this->addFlash('danger', 'Formulaire invalide.');
        }

        return $this->redirectToRoute('livraison_board');
    }

#[Route(
    '/gestionnaire/livraisons/zone/{idZone}/assign',
    name: 'livraison_assign_zone',
    requirements: ['idZone' => '\d+'],
    methods: ['POST']
)]
public function assignZone(int $idZone, Request $request): Response
{
    $dto = new LivraisonAssignDto();

    $filterData = $this->livraisonService->getFilterData();

    $form = $this->createForm(AssignLivreurFormType::class, $dto, [
        'choices_livreurs' => $filterData->livreurs,
    ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $res = $this->livraisonService->assignLivreurToZone($idZone, $dto);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
    } else {
        $this->addFlash('danger', 'Formulaire invalide.');
    }

    return $this->redirectToRoute('livraison_board');
}


#[Route('/gestionnaire/livraisons/{idCommande}/terminer', name: 'livraison_terminer', requirements: ['idCommande' => '\d+'], methods: ['POST'])]
public function terminer(int $idCommande, Request $request): Response
{
    $token = (string) $request->request->get('_token');

    if (!$this->isCsrfTokenValid('livraison_terminer', $token)) {
        return new JsonResponse(['success' => false, 'message' => 'CSRF invalide.'], 400);
    }

    $res = $this->livraisonService->terminerCommande($idCommande);

    return new JsonResponse([
        'success' => $res->success,
        'message' => $res->message,
    ], $res->success ? 200 : 400);
}

}
