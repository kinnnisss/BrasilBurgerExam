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
        }else{
            $qb->andWhere('c.etat = :etat')
            ->setParameter('etat', EtatCommandeEnum::VALIDEE);
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
    if (!$cmd) {
        return false;
    }

    if ($cmd->getTypeConsommation() !== TypeConsommationEnum::LIVRAISON) {
        return false;
    }

    if ($cmd->getEtat() !== EtatCommandeEnum::VALIDEE) {
        return false;
    }

    if ($cmd->getLivreur() !== null) {
        return false;
    }

    if (!$this->isLivreurDisponible($idLivreur)) {
        return false;
    }

    $livreurRef = $this->getEntityManager()->getReference(\App\Entity\Livreur::class, $idLivreur);
    $cmd->setLivreur($livreurRef);

    $this->getEntityManager()->flush();
    return true;
}

    public function isLivreurDisponible(int $idLivreur): bool
    {
        $count = (int) $this->createQueryBuilder('c')
            ->select('COUNT(c.idCommande)')
            ->andWhere('c.typeConsommation = :tc')
            ->andWhere('c.livreur = :livreurId')
            ->andWhere('c.etat = :etatActive')
            ->setParameter('tc', TypeConsommationEnum::LIVRAISON)
            ->setParameter('livreurId', $idLivreur)
            ->setParameter('etatActive', EtatCommandeEnum::VALIDEE)
            ->getQuery()
            ->getSingleScalarResult();

        return $count === 0;
    }

    public function assignLivreurToZoneValidated(int $idZone, int $idLivreur): int
    {
        $em = $this->getEntityManager();

        $cmds = $this->createQueryBuilder('c')
            ->andWhere('c.typeConsommation = :tc')
            ->andWhere('c.etat = :etat')
            ->andWhere('c.zone = :zoneId')
            ->andWhere('c.livreur IS NULL')
            ->setParameter('tc', TypeConsommationEnum::LIVRAISON)
            ->setParameter('etat', EtatCommandeEnum::VALIDEE)
            ->setParameter('zoneId', $idZone)
            ->getQuery()
            ->getResult();

        if (!$cmds) {return 0;
        }

        $livreurRef = $em->getReference(\App\Entity\Livreur::class, $idLivreur);

        foreach ($cmds as $cmd) {
            $cmd->setLivreur($livreurRef);
        }

        $em->flush();
        return count($cmds);
    }

    public function terminerCommande(int $idCommande): bool
    {
        /** @var Commande|null $cmd */
        $cmd = $this->find($idCommande);
        if (!$cmd) {return false;
        }

        if ($cmd->getTypeConsommation() !== TypeConsommationEnum::LIVRAISON) {return false;
        }

        if ($cmd->getEtat() !== EtatCommandeEnum::VALIDEE) {return false;
        }

        if ($cmd->getLivreur() === null) {return false;
        }

        $cmd->setEtat(EtatCommandeEnum::TERMINER);

        $this->getEntityManager()->flush();
        return true;
    }

    public function getLockedLivreurIdForZone(int $idZone): ?int
    {
        $row = $this->createQueryBuilder('c')
            ->select('COUNT(DISTINCT l.idLivreur) AS nb', 'MIN(l.idLivreur) AS livreurId')
            ->innerJoin('c.livreur', 'l')
            ->andWhere('c.typeConsommation = :tc')
            ->andWhere('c.etat = :etat')
            ->andWhere('c.zone = :zoneId')
            ->setParameter('tc', TypeConsommationEnum::LIVRAISON)
            ->setParameter('etat', EtatCommandeEnum::VALIDEE)
            ->setParameter('zoneId', $idZone)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$row) {
            return null;
        }

        $nb = (int) ($row['nb'] ?? 0);
        if ($nb === 0) {
            return null;
        }

        if ($nb > 1) {
            return -1;
        }

        return (int) $row['livreurId'];
    }

    public function isZoneAvailableForLivreur(int $idZone, int $idLivreur): bool
    {
        $lockedTo = $this->getLockedLivreurIdForZone($idZone);

        if ($lockedTo === null) {
            return true;
        }

        if ($lockedTo === -1) {
            return false;
        }

        return $lockedTo === $idLivreur;
    }

}
