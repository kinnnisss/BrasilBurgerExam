<?php

namespace App\Repository;

use App\Dto\Common\SelectItemDto;
use App\Entity\Livreur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LivreurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livreur::class);
    }

    /** @return SelectItemDto[] */
    public function findAllForSelect(): array
    {
        $rows = $this->createQueryBuilder('l')
            ->orderBy('l.nom', 'ASC')
            ->addOrderBy('l.prenom', 'ASC')
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $l) {
            /** @var Livreur $l */
            $label = sprintf(
                '%s %s (%s)',
                $l->getNom(),
                $l->getPrenom(),
                $l->getTelephone()
            );
            $items[] = new SelectItemDto((int)$l->getIdLivreur(), $label);
        }

        return $items;
    }


}
