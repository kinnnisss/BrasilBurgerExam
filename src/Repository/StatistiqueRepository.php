<?php

namespace App\Repository;

use App\Dto\Dashboard\TopBurgerDto;
use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Enum\EtatCommandeEnum;
use App\Enum\TypeArticleEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }
    private function countByEtatForDay(\DateTimeInterface $day, EtatCommandeEnum $etat): int
    {
        $start = \DateTimeImmutable::createFromInterface($day)->setTime(0, 0, 0);
        $end   = $start->modify('+1 day');

        return (int)$this->createQueryBuilder('c')
            ->select('COUNT(c.idCommande)')
            ->andWhere('c.dateCommande >= :start AND c.dateCommande < :end')
            ->andWhere('c.etat = :etat')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->setParameter('etat', $etat)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
