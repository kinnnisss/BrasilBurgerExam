<?php

namespace App\Controller;

use App\Service\DashboardServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    public function __construct(
        private readonly DashboardServiceInterface $dashboardService
    ) {}

    #[Route('/gestionnaire', name: 'dashboard_index', methods: ['GET'])]
    public function index(): Response
    {
        $today = new \DateTimeImmutable('today');
        $dto = $this->dashboardService->getDashboard($today);

        return $this->render('dashboard/index.html.twig', [
            'dto' => $dto
        ]);
    }
}
