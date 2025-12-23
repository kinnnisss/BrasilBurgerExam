<?php

namespace App\Controller;

use App\Dto\Client\ClientCommandeFilterDto;
use App\Dto\Client\ClientFilterDto;
use App\Form\Client\ClientCommandeFilterFormType;
use App\Form\Client\ClientFilterFormType;
use App\Service\ClientServiceInterface;
use App\Service\CommandeServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    public function __construct(
        private readonly ClientServiceInterface $clientService,
        private readonly CommandeServiceInterface $commandeService
    ) {}

    #[Route('/gestionnaire/clients', name: 'client_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $filter = new ClientFilterDto();
        $filter->page = (int) $request->query->get('page', 1);
        $filter->pageSize = 12;

        $form = $this->createForm(ClientFilterFormType::class, $filter, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
        $form->handleRequest($request);

        $paged = $this->clientService->search($filter);

        return $this->render('client/index.html.twig', [
            'form' => $form->createView(),
            'paged' => $paged,
        ]);
    }

    #[Route('/gestionnaire/clients/{id}', name: 'client_details', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function details(int $id, Request $request): Response
    {
        $filter = new ClientCommandeFilterDto();
        $filter->page = (int) $request->query->get('page', 1);
        $filter->pageSize = 10;

        $form = $this->createForm(ClientCommandeFilterFormType::class, $filter, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
        $form->handleRequest($request);

        $dto = $this->clientService->getDetails($id, $filter);

        return $this->render('client/details.html.twig', [
            'filterForm' => $form->createView(),
            'dto' => $dto,
        ]);
    }

    #[Route('/gestionnaire/clients/{idClient}/commandes/{idCommande}/cancel', name: 'client_commande_cancel', requirements: ['idClient' => '\d+', 'idCommande' => '\d+'], methods: ['POST'])]
    public function cancelCommandeForClient(int $idClient, int $idCommande): Response
    {
        $res = $this->commandeService->cancelForClient($idClient, $idCommande);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);

        return $this->redirectToRoute('client_details', ['id' => $idClient]);
    }
}
