<?php

namespace App\Repository;

use App\Dto\Livraison\LivraisonFilterDto;
use App\Dto\Raw\LivraisonRawDto;
use App\Entity\Commande;
use App\Enum\TypeConsommationEnum;
use App\Enum\EtatCommandeEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /** @return LivraisonRawDto[] */
    public function findLivraisonsRaw(LivraisonFilterDto $filter): array
    {
        $page = max(1, (int)$filter->page);
        $pageSize = max(1, min(500, (int)$filter->pageSize));

        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.client', 'cl')
            ->leftJoin('c.zone', 'z')
            ->leftJoin('c.quartier', 'q')
            ->leftJoin('c.livreur', 'l')
            ->andWhere('c.typeConsommation = :tc')
            ->setParameter('tc', TypeConsommationEnum::LIVRAISON);

        if ($filter->zoneId !== null) {
            $qb->andWhere('c.zone = :zoneId')->setParameter('zoneId', (int)$filter->zoneId);
        }

        if ($filter->livreurId !== null) {
            $qb->andWhere('c.livreur = :livreurId')->setParameter('livreurId', (int)$filter->livreurId);
        }

        if ($filter->etat !== null) {
            $qb->andWhere('c.etat = :etat')->setParameter('etat', $filter->etat);
        }

        $qb->orderBy('c.dateCommande', 'DESC');

        $qb->select(sprintf(
            'NEW %s(
                c.idCommande, c.reference, c.dateCommande, c.etat, c.montantTotal,
                cl.idClient, cl.nom, cl.prenom, cl.telephone,
                z.idZone, z.libelle,
                q.idQuartier, q.libelle,
                l.idLivreur, l.nom, l.prenom, l.telephone
            )',
            LivraisonRawDto::class
        ));

        return $qb->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();
    }

    public function assignLivreur(int $idCommande, int $idLivreur): bool
    {
        /** @var Commande|null $cmd */
        $cmd = $this->find($idCommande);
        if (!$cmd){ return false;
        }

        if ($cmd->getTypeConsommation() !== TypeConsommationEnum::LIVRAISON){
             return false;
        }
        if ($cmd->getEtat() !== EtatCommandeEnum::VALIDEE)
            { return false;
            }
        if ($cmd->getLivreur() !== null){
            return false;
        }

        $livreurRef = $this->getEntityManager()->getReference(\App\Entity\Livreur::class, $idLivreur);
        $cmd->setLivreur($livreurRef);

        $this->getEntityManager()->flush();
        return true;
    }
}
