<?php

namespace App\Controller;

use App\Dto\Commande\CommandeListFilterDto;
use App\Form\Commande\CommandeListFilterFormType;
use App\Service\CommandeServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandeController extends AbstractController
{
    public function __construct(
        private readonly CommandeServiceInterface $commandeService
    ) {}

    #[Route('/gestionnaire/commandes', name: 'commande_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $filter = new CommandeListFilterDto();
        $filter->page = (int) $request->query->get('page', 1);
        $filter->pageSize = 12;

        $form = $this->createForm(CommandeListFilterFormType::class, $filter, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
        $form->handleRequest($request);

        $paged = $this->commandeService->search($filter);

        return $this->render('commande/index.html.twig', [
            'form' => $form->createView(),
            'paged' => $paged,
        ]);
    }

}
