<?php

namespace App\Repository;

use App\Dto\Catalogue\BurgerListItemDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Entity\Burger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BurgerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burger::class);
    }

    /**
     * @return PagedResultDto items = BurgerListItemDto[]
     */
    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto
    {
        $page = max(1, $page);
        $pageSize = max(1, min(200, $pageSize));

        $qb = $this->createQueryBuilder('b');

        if ($q !== null && trim($q) !== '') {
            $qb->andWhere('LOWER(b.nom) LIKE :q')
               ->setParameter('q', '%' . mb_strtolower(trim($q)) . '%');
        }

        if ($archived !== null) {
            $qb->andWhere('b.isArchived = :archived')
               ->setParameter('archived', $archived);
        }

        $qb->orderBy('b.nom', 'ASC');

        $countQb = clone $qb;
        $totalItems = (int) $countQb
            ->select('COUNT(b.idBurger)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->select('b')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $burger) {
            /** @var Burger $burger */
            $items[] = new BurgerListItemDto(
                $burger->getIdBurger(),
                $burger->getNom(),
                (string) $burger->getPrix(),
                $burger->getImage(),
                (bool) $burger->isArchived()
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }


}
