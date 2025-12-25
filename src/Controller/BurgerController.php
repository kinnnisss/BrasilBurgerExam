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

    #[Route('/gestionnaire/burgers', name: 'burger_index', methods: ['GET','POST'])]
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
        $pageSize = 4;

        $paged = $this->burgerService->search($q, $archived, $page, $pageSize);
        $showCreateModal = false;
        $showEditModal = false;
        $createForm = null;
        $editForm = null;
        $editData = null;

        if ($request->query->get('action') === 'create' ||
            ($request->isMethod('POST') && $request->request->has('burger_create_form'))) {
            
            $dto = new BurgerUpsertDto();
            $createForm = $this->createForm(BurgerCreateFormType::class, $dto, [
                'action' => $this->generateUrl('burger_index', ['action' => 'create'])
            ]);
            $createForm->handleRequest($request);

            if ($createForm->isSubmitted() && $createForm->isValid()) {
                $res = $this->burgerService->create($dto);
                $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                if ($res->success) {
                    return $this->redirectToRoute('burger_index');
                }
            }
            
            $showCreateModal = true;
        }
        $editId = $request->query->get('edit');
        
        if ($request->isMethod('POST') && $request->request->has('burger_update_form')) {
            $editId = $request->query->get('edit');
        }
        
        if ($editId) {
            try {
                $editData = $this->burgerService->getEditData((int)$editId);

                $dto = new BurgerUpsertDto();
                $dto->nom = $editData->nom;
                $dto->prix = $editData->prix;
                $dto->imageFile = null;

                $editForm = $this->createForm(BurgerUpdateFormType::class, $dto, [
                    'currentImagePath' => $editData->currentImagePath,
                    'action' => $this->generateUrl('burger_index', ['edit' => $editId])
                ]);
                $editForm->handleRequest($request);

                if ($editForm->isSubmitted() && $editForm->isValid()) {
                    $res = $this->burgerService->update((int)$editId, $dto);
                    $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                    if ($res->success) {
                        return $this->redirectToRoute('burger_index');
                    }
                }
                
                $showEditModal = true;
            } catch (\RuntimeException $e) {
                $this->addFlash('danger', $e->getMessage());
                return $this->redirectToRoute('burger_index');
            }
        }

        return $this->render('burger/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,
            'showCreateModal' => $showCreateModal,
            'showEditModal' => $showEditModal,
            'createForm' => $createForm?->createView(),
            'editForm' => $editForm?->createView(),
            'editData' => $editData,
        ]);
    }

    #[Route('/gestionnaire/burgers/{id}/archive', name: 'burger_archive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function archive(int $id): Response
    {
        $res = $this->burgerService->archive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('burger_index');
    }

    #[Route('/gestionnaire/burgers/{id}/unarchive', name: 'burger_unarchive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function unarchive(int $id): Response
    {
        $res = $this->burgerService->unarchive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('burger_index');
    }

}
