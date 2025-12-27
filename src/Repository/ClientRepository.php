<?php

namespace App\Repository;

use App\Dto\Client\ClientFilterDto;
use App\Dto\Client\ClientListItemDto;
use App\Dto\Common\PagedResultDto;
use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    /** @return PagedResultDto items = ClientListItemDto[] */
    public function search(ClientFilterDto $filter): PagedResultDto
    {
        $page = max(1, $filter->page);
        $pageSize = max(1, min(200, $filter->pageSize));
        $q = $filter->q !== null ? trim($filter->q) : null;

        $qb = $this->createQueryBuilder('c');

        if ($q !== null && $q !== '') {
            $qq = '%' . mb_strtolower($q) . '%';
            $qb->andWhere('LOWER(c.nom) LIKE :q OR LOWER(c.prenom) LIKE :q OR LOWER(c.telephone) LIKE :q')
               ->setParameter('q', $qq);
        }

        $qb->orderBy('c.nom', 'ASC')->addOrderBy('c.prenom', 'ASC');

        $countQb = clone $qb;
        $totalItems = (int)$countQb
            ->resetDQLPart('orderBy')
            ->select('COUNT(c.idClient)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->select('c')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $c) {
            /** @var Client $c */
            $items[] = new ClientListItemDto(
                (int)$c->getIdClient(),
                trim($c->getNom() . ' ' . $c->getPrenom()),
                $c->getTelephone(),
                $c->getLogin()
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }

        public function findById(int $idClient): ?Client
    {
        return $this->find($idClient);
    }
}
