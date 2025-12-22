<?php

namespace App\Repository;

use App\Dto\Catalogue\MenuListItemDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    /**
     * @return PagedResultDto items = MenuListItemDto[]
     */
    public function search(?string $q, ?bool $archived, int $page, int $pageSize): PagedResultDto
    {
        $page = max(1, $page);
        $pageSize = max(1, min(200, $pageSize));

        $qb = $this->createQueryBuilder('m');

        if ($q !== null && trim($q) !== '') {
            $qb->andWhere('LOWER(m.nom) LIKE :q')
               ->setParameter('q', '%' . mb_strtolower(trim($q)) . '%');
        }

        if ($archived !== null) {
            $qb->andWhere('m.isArchived = :archived')
               ->setParameter('archived', $archived);
        }

        $qb->orderBy('m.nom', 'ASC');

        $countQb = clone $qb;
        $totalItems = (int) $countQb
            ->select('COUNT(m.idMenu)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->select('m')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $menu) {
            /** @var Menu $menu */
            $items[] = new MenuListItemDto(
                (int) $menu->getIdMenu(),
                $menu->getNom(),
                (string) $menu->getPrix(),
                $menu->getImage(),
                (bool) $menu->isArchived()
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }

    public function findById(int $idMenu): ?Menu
    {
        return $this->find($idMenu);
    }

    public function insert(Menu $menu): int
    {
        $em = $this->getEntityManager();
        $em->persist($menu);
        $em->flush();

        return (int) $menu->getIdMenu();
    }


}
