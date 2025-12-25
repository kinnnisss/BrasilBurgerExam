<?php

namespace App\Controller;

use App\Dto\Catalogue\ComplementUpsertDto;
use App\Form\Catalogue\ComplementUpsertFormType;
use App\Form\Catalogue\ComplementFilterFormType;
use App\Service\ComplementServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\TypeComplementEnum;

class ComplementController extends AbstractController
{
    public function __construct(
        private readonly ComplementServiceInterface $complementService
    ) {}

    #[Route('/gestionnaire/complements', name: 'complement_index', methods: ['GET','POST'])]
    public function index(Request $request): Response
    {
    $filterForm = $this->createForm(ComplementFilterFormType::class, null, [
        'method' => 'GET',
        'csrf_protection' => false,
    ]);
    $filterForm->handleRequest($request);

    $data = $filterForm->getData() ?? [];
    $q = $data['q'] ?? null;

    $typeValue = $data['type'] ?? null;
    $type = $typeValue ? TypeComplementEnum::tryFrom($typeValue) : null;

    $status = $data['status'] ?? 'ALL';
    $archived = match ($status) {
        'ACTIVE' => false,
        'ARCHIVED' => true,
        default => null,
    };

    $page = (int) $request->query->get('page', 1);
    $pageSize = 5;

    $paged = $this->complementService->search($q, $type, $archived, $page, $pageSize);
    $showCreateModal = false;
    $showEditModal = false;

    $createDto = new ComplementUpsertDto();
    $editDto   = new ComplementUpsertDto();
    $editData  = null;

    $action = (string) $request->query->get('action', '');
    $editId = (int) $request->query->getInt('edit', 0);
    $postedMode = (string) $request->request->get('mode', '');
    $createForm = $this->createForm(ComplementUpsertFormType::class, $createDto, [
        'action' => $this->generateUrl('complement_index', array_filter([
            'action' => 'create',
            'page'   => $page,
            'q'      => $request->query->get('q'),
            'type'   => $request->query->get('type'),
            'status' => $request->query->get('status'),
        ])),
    ]);
    $createForm->handleRequest($request);

    if ($action === 'create' || ($request->isMethod('POST') && $postedMode === 'create')) {
        $showCreateModal = true;

        if ($createForm->isSubmitted() && $createForm->isValid()) {
            $res = $this->complementService->create($createDto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('complement_index', array_filter([
                    'page'   => 1,
                    'q'      => $request->query->get('q'),
                    'type'   => $request->query->get('type'),
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
                $editData = $this->complementService->getEditData($editId);

                $editDto->nom = $editData->nom;
                $editDto->prix = $editData->prix;
                $editDto->type = $editData->type;
                $editDto->imageFile = null;

                $editForm = $this->createForm(ComplementUpsertFormType::class, $editDto, [
                    'action' => $this->generateUrl('complement_index', array_filter([
                        'edit'   => $editId,
                        'page'   => $page,
                        'q'      => $request->query->get('q'),
                        'type'   => $request->query->get('type'),
                        'status' => $request->query->get('status'),
                    ])),
                ]);
                $editForm->handleRequest($request);

                $showEditModal = true;

                if ($editForm->isSubmitted() && $editForm->isValid()) {
                    $res = $this->complementService->update($editId, $editDto);
                    $this->addFlash($res->success ? 'success' : 'danger', $res->message);

                    if ($res->success) {
                        return $this->redirectToRoute('complement_index', array_filter([
                            'page'   => $page,
                            'q'      => $request->query->get('q'),
                            'type'   => $request->query->get('type'),
                            'status' => $request->query->get('status'),
                        ]));
                    }
                }

            } catch (\RuntimeException $e) {
                $this->addFlash('danger', $e->getMessage());
                return $this->redirectToRoute('complement_index');
            }
        }
    } else {
        $editForm = null;
    }

    return $this->render('complement/index.html.twig', [
        'form'  => $filterForm->createView(),
        'paged' => $paged,

        'showCreateModal' => $showCreateModal,
        'showEditModal'   => $showEditModal,

        'createForm' => $createForm->createView(),
        'editForm'   => isset($editForm) && $editForm ? $editForm->createView() : null,
        'editData'   => $editData,
    ]);
}

   #[Route('/gestionnaire/complements/{id}/archive', name: 'complement_archive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function archive(int $id): Response
    {
        $res = $this->complementService->archive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('complement_index');
    }
    #[Route('/gestionnaire/complements/{id}/unarchive', name: 'complement_unarchive', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function unarchive(int $id): Response
    {
        $res = $this->complementService->unarchive($id);
        $this->addFlash($res->success ? 'success' : 'danger', $res->message);
        return $this->redirectToRoute('complement_index');
    }
}
