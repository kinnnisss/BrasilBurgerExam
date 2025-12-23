<?php

namespace App\Controller;

use App\Dto\Catalogue\MenuCreateDto;
use App\Dto\Catalogue\MenuUpdateDto;
use App\Form\Catalogue\MenuCreateFormType;
use App\Form\Catalogue\MenuUpdateFormType;
use App\Form\Catalogue\MenuFilterFormType;
use App\Service\MenuServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuController extends AbstractController
{
    public function __construct(
        private readonly MenuServiceInterface $menuService
    ) {}

    #[Route('/gestionnaire/menus', name: 'menu_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $filterForm = $this->createForm(MenuFilterFormType::class, null, [
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

        $paged = $this->menuService->search($q, $archived, $page, $pageSize);

        return $this->render('menu/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,
        ]);
    }

}
