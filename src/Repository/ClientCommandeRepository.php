<?php

namespace App\Repository;

use App\Dto\Client\ClientCommandeFilterDto;
use App\Dto\Client\ClientCommandeListItemDto;
use App\Dto\Common\PagedResultDto;
use App\Entity\Commande;
use App\Enum\EtatCommandeEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClientCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    /** @return PagedResultDto items = ClientCommandeListItemDto[] */
    public function searchCommandesByClient(int $idClient, ClientCommandeFilterDto $filter): PagedResultDto
    {
        $page = max(1, (int)$filter->page);
        $pageSize = max(1, min(200, (int)$filter->pageSize));

        $qb = $this->createQueryBuilder('c')
            ->andWhere('c.client = :idClient')
            ->setParameter('idClient', $idClient);

        if ($filter->etat !== null) {
            $qb->andWhere('c.etat = :etat')->setParameter('etat', $filter->etat);
        }

        if ($filter->date !== null) {
            $start = \DateTimeImmutable::createFromInterface($filter->date)->setTime(0, 0, 0);
            $end   = $start->modify('+1 day');
            $qb->andWhere('c.dateCommande >= :start AND c.dateCommande < :end')
               ->setParameter('start', $start)
               ->setParameter('end', $end);
        }

        $countQb = clone $qb;
        $totalItems = (int)$countQb->select('COUNT(c.idCommande)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->orderBy('c.dateCommande', 'DESC')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $cmd) {
            /** @var Commande $cmd */
            $etat = $cmd->getEtat();
            $canCancel = in_array($etat, [EtatCommandeEnum::ENCOURS, EtatCommandeEnum::VALIDEE], true);

            $items[] = new ClientCommandeListItemDto(
                (int)$cmd->getIdCommande(),
                $cmd->getReference(),
                $cmd->getDateCommande(),
                (string)$cmd->getMontantTotal(),
                $etat,
                $cmd->getTypeConsommation(),
                $canCancel
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }
}
