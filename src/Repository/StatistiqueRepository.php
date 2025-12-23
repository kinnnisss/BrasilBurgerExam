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

    public function sumRecettesDuJour(\DateTimeInterface $day): string
    {
        $start = \DateTimeImmutable::createFromInterface($day)->setTime(0, 0, 0);
        $end   = $start->modify('+1 day');

        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.paiement', 'p')
            ->andWhere('c.dateCommande >= :start AND c.dateCommande < :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->select('COALESCE(SUM(p.montant), 0)');

        $val = $qb->getQuery()->getSingleScalarResult();
        return number_format((float)$val, 2, '.', '');
    }
   public function countCommandesEnCoursDuJour(\DateTimeInterface $day): int
    {
        return $this->countByEtatForDay($day, EtatCommandeEnum::ENCOURS);
    }

    public function countCommandesValideesDuJour(\DateTimeInterface $day): int
    {
        return $this->countByEtatForDay($day, EtatCommandeEnum::VALIDEE);
    }
    public function countCommandesAnnuleesDuJour(\DateTimeInterface $day): int
    {
        return $this->countByEtatForDay($day, EtatCommandeEnum::ANNULEE);
    }
    public function countCommandesTermineesDuJour(\DateTimeInterface $day): int
    {
        return $this->countByEtatForDay($day, EtatCommandeEnum::TERMINER);
    }


    public function recettesSemaine(\DateTimeInterface $day): array
    {
        $d = \DateTimeImmutable::createFromInterface($day);
        $start = $d->modify('monday this week')->setTime(0, 0, 0);
        $end   = $start->modify('+7 days');

        $conn = $this->getEntityManager()->getConnection();

        $sql = <<<SQL
            SELECT
                DATE(c.date_commande) AS jour,
                COALESCE(SUM(p.montant), 0) AS total
            FROM commande c
            INNER JOIN paiement p ON p.id_commande = c.id_commande
            WHERE c.date_commande >= :start
              AND c.date_commande < :end
            GROUP BY jour
            ORDER BY jour ASC
        SQL;

        $rows = $conn->executeQuery($sql, [
            'start' => $start->format('Y-m-d H:i:s'),
            'end'   => $end->format('Y-m-d H:i:s'),
        ])->fetchAllAssociative();

        $map = [];
        foreach ($rows as $row) {
            $map[$row['jour']] = (float)$row['total'];
        }

        $labels = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];
        $values = [];

        for ($i = 0; $i < 7; $i++) {
            $key = $start->modify("+$i days")->format('Y-m-d');
            $values[] = $map[$key] ?? 0.0;
        }

        return ['labels' => $labels, 'values' => $values];
    }

}
