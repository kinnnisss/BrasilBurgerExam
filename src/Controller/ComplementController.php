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

class ComplementController extends AbstractController
{
    public function __construct(
        private readonly ComplementServiceInterface $complementService
    ) {}

    #[Route('/gestionnaire/complements', name: 'complement_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $filterForm = $this->createForm(ComplementFilterFormType::class, null, [
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
        $filterForm->handleRequest($request);

        $data = $filterForm->getData() ?? [];
        $q = $data['q'] ?? null;
        $type = $data['type'] ?? null;
        $status = $data['status'] ?? 'ALL';

        $archived = match ($status) {
            'ACTIVE' => false,
            'ARCHIVED' => true,
            default => null,
        };

        $page = (int)($request->query->get('page', 1));
        $pageSize = 12;

        $paged = $this->complementService->search($q, $type, $archived, $page, $pageSize);

        return $this->render('complement/index.html.twig', [
            'form' => $filterForm->createView(),
            'paged' => $paged,
        ]);
    }

    #[Route('/gestionnaire/complements/create', name: 'complement_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $dto = new ComplementUpsertDto();
        $form = $this->createForm(ComplementUpsertFormType::class, $dto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $res = $this->complementService->create($dto);
            $this->addFlash($res->success ? 'success' : 'danger', $res->message);

            if ($res->success) {
                return $this->redirectToRoute('complement_index');
            }
        }

        return $this->render('complement/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
