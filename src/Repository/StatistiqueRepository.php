<?php

namespace App\Repository;

use App\Dto\Raw\TopBurgerDto;
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
 
    /** @return TopBurgerDto[] */
    public function topBurgersDuJour(\DateTimeInterface $day, int $limit): array
    {
        $start = \DateTimeImmutable::createFromInterface($day)->setTime(0, 0, 0);
        $end   = $start->modify('+1 day');

        $qb = $this->getEntityManager()->createQueryBuilder()
            ->from(LigneCommande::class, 'lc')
            ->innerJoin('lc.commande', 'c')
            ->innerJoin('lc.burger', 'b')
            ->andWhere('lc.typeArticle = :ta')
            ->andWhere('c.dateCommande >= :start AND c.dateCommande < :end')
            ->setParameter('ta', TypeArticleEnum::BURGER)
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->groupBy('b.idBurger, b.nom')
            ->orderBy('SUM(lc.quantite)', 'DESC')
            ->setMaxResults(max(1, $limit))
            ->select(sprintf(
                'NEW %s(b.idBurger, b.nom, SUM(lc.quantite))',
                TopBurgerDto::class
            ));

        return $qb->getQuery()->getResult();
    }

}
