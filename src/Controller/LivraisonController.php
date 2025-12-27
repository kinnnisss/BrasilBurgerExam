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

        return $this->render('livraison/board.html.twig', [
            'form' => $form->createView(),
            'board' => $board,
            'filterData' => $filterData,
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
}
