<?php

namespace App\Controller;

use App\Service\DashboardServiceInterface;
use App\Dto\Commande\CommandeListFilterDto;
use App\Repository\{StatistiqueRepository,CommandeRepository};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    public function __construct(
        private readonly DashboardServiceInterface $dashboardService,private readonly StatistiqueRepository $statistiqueRepository,
        private readonly CommandeRepository $commandeRepository
    ) {}

    #[Route('/gestionnaire', name: 'dashboard_index', methods: ['GET'])]
    public function index(): Response
    {
        $today = new \DateTimeImmutable('today');
        $dto = $this->dashboardService->getDashboard($today);

        $week = $this->statistiqueRepository->recettesSemaine($today);

        $filter = new CommandeListFilterDto();
        $filter->page = 1;
        $filter->pageSize = 5;
        $filter->date = $today;

        $paged = $this->commandeRepository->searchForList($filter);
        $lastOrders = $paged->items;

        return $this->render('dashboard/index.html.twig', [
            'dto' => $dto,
            'weekLabels' => $week['labels'],
            'weekValues' => $week['values'],
            'lastOrders' => $lastOrders,
        ]);
    }
}
