<?php

namespace App\Repository;

use App\Dto\Common\SelectItemDto;
use App\Entity\Zone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ZoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zone::class);
    }

    /** @return SelectItemDto[] */
    public function findAllForSelect(): array
    {
        $rows = $this->createQueryBuilder('z')
            ->orderBy('z.libelle', 'ASC')
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $z) {
            /** @var Zone $z */
            $items[] = new SelectItemDto((int)$z->getIdZone(), $z->getLibelle());
        }
        return $items;
    }

    public function findById(int $idZone): ?Zone
    {
        return $this->find($idZone);
    }
}
