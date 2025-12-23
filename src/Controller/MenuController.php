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

    #[Route('/gestionnaire/menus/create', name: 'menu_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $data = $this->menuService->getCreateData();

        $dto = new MenuCreateDto();
        $form = $this->createForm(MenuCreateFormType::class, $dto, [
            'burgers' => $data->burgers,
            'frites' => $data->frites,
            'boissons' => $data->boissons,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->menuService->create($dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('menu_index');
            }
        }

        return $this->render('menu/create.html.twig', [
            'form' => $form->createView(),
            'data' => $data,
        ]);
    }

    #[Route('/gestionnaire/menus/{id}/edit', name: 'menu_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $edit = $this->menuService->getEditData($id);
        $data = $this->menuService->getCreateData();

        $dto = new MenuUpdateDto();
        $dto->nom = $edit->nom;
        $dto->burgerId = $edit->burgerId;
        $dto->fritesId = $edit->fritesId;
        $dto->boissonId = $edit->boissonId;
        $dto->imageFile = null;

        $form = $this->createForm(MenuUpdateFormType::class, $dto, [
            'burgers' => $data->burgers,
            'frites' => $data->frites,
            'boissons' => $data->boissons,
            'currentImagePath' => $edit->currentImagePath,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->menuService->update($id, $dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('menu_index');
            }
        }

        return $this->render('menu/edit.html.twig', [
            'form' => $form->createView(),
            'edit' => $edit,
            'data' => $data,
        ]);
    }

    #[Route('/gestionnaire/menus/{id}/archive', name: 'menu_archive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function archive(int $id): Response
    {
        $res = $this->menuService->archive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('menu_index');
    }

    #[Route('/gestionnaire/menus/{id}/unarchive', name: 'menu_unarchive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function unarchive(int $id): Response
    {
        $res = $this->menuService->unarchive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('menu_index');
    }
}
