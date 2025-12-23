<?php

namespace App\Controller;

use App\Dto\Catalogue\BurgerUpsertDto;
use App\Service\BurgerServiceInterface;
use App\Form\Catalogue\BurgerCreateFormType;
use App\Form\Catalogue\BurgerUpdateFormType;
use App\Form\Catalogue\BurgerFilterFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    public function __construct(
        private readonly BurgerServiceInterface $burgerService
    ) {}

    #[Route('/gestionnaire/burgers', name: 'burger_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $filterForm = $this->createForm(BurgerFilterFormType::class, null, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
        $filterForm->handleRequest($request);

        $data = $filterForm->getData() ?? [];
        $q = $data['q'] ?? null;

        $status = $data['status'] ?? 'ALL';
        $archived = match ($status) {
            'ACTIVE' => false,
            'ARCHIVED' => true,
            default => null,
        };

        $page = (int)($request->query->get('page', 1));
        $pageSize = 12;

        $paged = $this->burgerService->search($q, $archived, $page, $pageSize);

        return $this->render('burger/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,
        ]);
    }


}
