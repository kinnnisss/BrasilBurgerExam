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

    #[Route('/gestionnaire/menus', name: 'menu_index', methods: ['GET','POST'])]
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

        $page = (int) $request->query->get('page', 1);
        $pageSize = 5;
        $paged = $this->menuService->search($q, $archived, $page, $pageSize);

        $menusEntities = $this->menuService->findEntitiesByIds(
            array_map(fn($m) => $m->id, $paged->items)
        );
        $showCreateModal = false;
        $showEditModal = false;

        $createData = $this->menuService->getCreateData();
        $createDto  = new MenuCreateDto();
        $editDto    = new MenuUpdateDto();
        $editData   = null;

        $action = (string) $request->query->get('action', '');
        $editId = $request->query->getInt('edit', 0);
        $postedMode = (string) $request->request->get('mode', '');
        $createForm = $this->createForm(MenuCreateFormType::class, $createDto, [
            'burgers' => $createData->burgers,
            'frites' => $createData->frites,
            'boissons' => $createData->boissons,
            'action' => $this->generateUrl('menu_index', array_filter([
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
                $res = $this->menuService->create($createDto);
                $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                if ($res->success) {
                    return $this->redirectToRoute('menu_index', array_filter([
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
                    $editData = $this->menuService->getEditData($editId);

                    $editDto->nom = $editData->nom;
                    $editDto->burgerId = $editData->burgerId;
                    $editDto->fritesId = $editData->fritesId;
                    $editDto->boissonId = $editData->boissonId;
                    $editDto->imageFile = null;
                    $editForm = $this->createForm(MenuUpdateFormType::class, $editDto, [
                        'burgers' => $createData->burgers,
                        'frites' => $createData->frites,
                        'boissons' => $createData->boissons,
                        'action' => $this->generateUrl('menu_index', array_filter([
                            'edit'   => $editId,
                            'page'   => $page,
                            'q'      => $request->query->get('q'),
                            'status' => $request->query->get('status'),
                        ])),
                    ]);
                    $editForm->handleRequest($request);

                    $showEditModal = true;

                    if ($editForm->isSubmitted() && $editForm->isValid()) {
                        $res = $this->menuService->update($editId, $editDto);
                        $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                        if ($res->success) {
                            return $this->redirectToRoute('menu_index', array_filter([
                                'page'   => $page,
                                'q'      => $request->query->get('q'),
                                'status' => $request->query->get('status'),
                            ]));
                        }
                    }

                } catch (\RuntimeException $e) {
                    $this->addFlash('danger', $e->getMessage());
                    return $this->redirectToRoute('menu_index');
                }
            }

        } else {
            $editForm = null;
        }
        return $this->render('menu/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,
            'menusEntities' => $menusEntities,

            'showCreateModal' => $showCreateModal,
            'showEditModal' => $showEditModal,

            'createForm' => $createForm->createView(),
            'editForm' => isset($editForm) && $editForm ? $editForm->createView() : null,
            'editData' => $editData,
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
