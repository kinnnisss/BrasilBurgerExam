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

    #[Route('/gestionnaire/burgers/create', name: 'burger_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $dto = new BurgerUpsertDto();
        $form = $this->createForm(BurgerCreateFormType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->burgerService->create($dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('burger_index');
            }
        }

        return $this->render('burger/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/gestionnaire/burgers/{id}/edit', name: 'burger_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $edit = $this->burgerService->getEditData($id);

        $dto = new BurgerUpsertDto();
        $dto->nom = $edit->nom;
        $dto->prix = $edit->prix;
        $dto->imageFile = null;

        $form = $this->createForm(BurgerUpdateFormType::class, $dto, [
            'currentImagePath' => $edit->currentImagePath
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->burgerService->update($id, $dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('burger_index');
            }
        }

        return $this->render('burger/edit.html.twig', [
            'form' => $form->createView(),
            'edit' => $edit,
        ]);
    }

}
