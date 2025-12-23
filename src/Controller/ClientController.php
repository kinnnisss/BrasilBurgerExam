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

}
