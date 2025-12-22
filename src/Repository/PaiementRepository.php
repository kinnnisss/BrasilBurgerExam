<?php

namespace App\Repository;

use App\Entity\Paiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiement::class);
    }

    public function findByCommandeId(int $idCommande): ?Paiement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.commande = :id')
            ->setParameter('id', $idCommande)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
