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
        $createDto  = new BurgerUpsertDto();
        $editDto    = new BurgerUpsertDto();
        $editData   = null;

        $action = (string) $request->query->get('action', '');
        $editId = $request->query->getInt('edit', 0);
        $postedMode = (string) $request->request->get('mode', '');
        $createForm = $this->createForm(BurgerCreateFormType::class, $createDto, [
            'action' => $this->generateUrl('burger_index', array_filter([
                'action' => 'create',
                'page'   => $page,
                'q'      => $request->query->get('q'),
                'status' => $request->query->get('status'),
            ])),
        ]);
        $createForm->handleRequest($request);

        if ($action === 'create' || ($request->isMethod('POST') && $postedMode === 'create')) {
            $showCreateModal = true;

            if ($createForm->isSubmitted() && $createForm->isValid()) {
                $res = $this->burgerService->create($createDto);
                $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                if ($res->success) {
                    return $this->redirectToRoute('burger_index', array_filter([
                        'page'   => 1,
                        'q'      => $request->query->get('q'),
                        'status' => $request->query->get('status'),
                    ]));
                }
            }
        }

        if ($editId > 0 || ($request->isMethod('POST') && $postedMode === 'edit')) {

            if ($request->isMethod('POST') && $postedMode === 'edit') {
                $editId = (int) $request->request->get('editId', 0);
            }

            if ($editId > 0) {
                try {
                    $editData = $this->burgerService->getEditData($editId);

                    $editDto->nom = $editData->nom;
                    $editDto->prix = $editData->prix;
                    $editDto->imageFile = null;

                    $editForm = $this->createForm(BurgerUpdateFormType::class, $editDto, [
                        'action' => $this->generateUrl('burger_index', array_filter([
                            'edit'   => $editId,
                            'page'   => $page,
                            'q'      => $request->query->get('q'),
                            'status' => $request->query->get('status'),
                        ])),
                    ]);
                    $editForm->handleRequest($request);

                    $showEditModal = true;

                    if ($editForm->isSubmitted() && $editForm->isValid()) {
                        $res = $this->burgerService->update($editId, $editDto);
                        $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                        if ($res->success) {
                            return $this->redirectToRoute('burger_index', array_filter([
                                'page'   => $page,
                                'q'      => $request->query->get('q'),
                                'status' => $request->query->get('status'),
                            ]));
                        }
                    }

                } catch (\RuntimeException $e) {
                    $this->addFlash('danger', $e->getMessage());
                    return $this->redirectToRoute('burger_index');
                }
            }
        } else {
            $editForm = null;
        }

        return $this->render('burger/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,

            'showCreateModal' => $showCreateModal,
            'showEditModal' => $showEditModal,

            'createForm' => $createForm->createView(),
            'editForm' => isset($editForm) && $editForm ? $editForm->createView() : null,
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
