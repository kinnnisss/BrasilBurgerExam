<?php

namespace App\Repository;

use App\Dto\Commande\CommandeListFilterDto;
use App\Dto\Commande\CommandeListItemDto;
use App\Dto\Commande\LigneCommandeDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Raw\CommandeDetailsRawDto;
use App\Dto\Raw\LigneCommandeRowRawDto;
use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Enum\TypeArticleEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /** @return PagedResultDto items = CommandeListItemDto[] */
    public function searchForList(CommandeListFilterDto $filter): PagedResultDto
    {
        $page = max(1, (int)$filter->page);
        $pageSize = max(1, min(200, (int)$filter->pageSize));

        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.client', 'cl');

        if ($filter->date !== null) {
            $start = \DateTimeImmutable::createFromInterface($filter->date)->setTime(0, 0, 0);
            $end   = $start->modify('+1 day');

            $qb->andWhere('c.dateCommande >= :start AND c.dateCommande < :end')
               ->setParameter('start', $start)
               ->setParameter('end', $end);
        }

        if ($filter->etat !== null) {
            $qb->andWhere('c.etat = :etat')
               ->setParameter('etat', $filter->etat);
        }

        if ($filter->typeArticle !== null) {
            $qb->innerJoin('c.lignes', 'lc_type')
               ->andWhere('lc_type.typeArticle = :ta')
               ->setParameter('ta', $filter->typeArticle)
               ->groupBy('c.idCommande');

        }

        $countQb = clone $qb;
        $totalItems = (int)$countQb
            ->select('COUNT(DISTINCT c.idCommande)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->select('c', 'cl')
            ->orderBy('c.dateCommande', 'DESC')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $row) {
            $commande = is_array($row) ? $row[0] : $row;
            /** @var Commande $commande */
            $client = $commande->getClient();

            $items[] = new CommandeListItemDto(
                (int)$commande->getIdCommande(),
                $commande->getReference(),
                $commande->getDateCommande(),
                trim($client->getNom().' '.$client->getPrenom()),
                $client->getTelephone(),
                $commande->getTypeConsommation(),
                (string)$commande->getMontantTotal(),
                $commande->getEtat()
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }

    public function findDetailsById(int $idCommande): ?CommandeDetailsRawDto
    {
        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.client', 'cl')
            ->leftJoin('c.zone', 'z')
            ->leftJoin('c.quartier', 'q')
            ->leftJoin('c.livreur', 'l')
            ->leftJoin('c.paiement', 'p')
            ->andWhere('c.idCommande = :id')
            ->setParameter('id', $idCommande);

        $qb->select(sprintf(
            'NEW %s(
                c.idCommande, c.reference, c.dateCommande, c.etat, c.typeConsommation, c.montantTotal,
                cl.idClient, cl.nom, cl.prenom, cl.telephone, cl.login,
                z.idZone, z.libelle,
                q.idQuartier, q.libelle,
                l.idLivreur, l.nom, l.prenom, l.telephone,
                p.idPaiement, p.datePaiement, p.montant, p.modePaiement
            )',
            CommandeDetailsRawDto::class
        ));

        return $qb->getQuery()->getOneOrNullResult();
    }

    /** @return LigneCommandeDto[] */
    public function findLignesByCommande(int $idCommande): array
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->from(LigneCommande::class, 'lc')
            ->leftJoin('lc.burger', 'b')
            ->leftJoin('lc.menu', 'm')
            ->leftJoin('lc.complement', 'cp')
            ->andWhere('lc.commande = :id')
            ->setParameter('id', $idCommande)
            ->orderBy('lc.idLigneCommande', 'ASC');

        $qb->select(sprintf(
            'NEW %s(
                lc.typeArticle, lc.quantite, lc.prixUnitaire, lc.prixTotal,
                b.idBurger, b.nom, b.image,
                m.idMenu, m.nom, m.image,
                cp.idComplement, cp.nom, cp.image
            )',
            LigneCommandeRowRawDto::class
        ));

        /** @var LigneCommandeRowRawDto[] $rows */
        $rows = $qb->getQuery()->getResult();

        $items = [];
        foreach ($rows as $r) {
            $items[] = new LigneCommandeDto(
                $r->typeArticle,
                $r->getDesignation(),
                $r->getImage(),
                (int)$r->quantite,
                (string)$r->prixUnitaire,
                (string)$r->prixTotal
            );
        }
        return $items;
    }


}
