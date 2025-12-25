<?php

namespace App\Repository;

use App\Dto\Catalogue\ComplementListItemDto;
use App\Dto\Common\PagedResultDto;
use App\Dto\Common\SelectItemDto;
use App\Entity\Complement;
use App\Enum\TypeComplementEnum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ComplementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Complement::class);
    }

    /**
     * @return PagedResultDto items = ComplementListItemDto[]
     */
    public function search(
        ?string $q,
        ?TypeComplementEnum $type,
        ?bool $archived,
        int $page,
        int $pageSize
    ): PagedResultDto {
        $page = max(1, $page);
        $pageSize = max(1, min(200, $pageSize));

        $qb = $this->createQueryBuilder('c');

        if ($q !== null && trim($q) !== '') {
            $qb->andWhere('LOWER(c.nom) LIKE :q')
               ->setParameter('q', '%' . mb_strtolower(trim($q)) . '%');
        }

        if ($type !== null) {
            $qb->andWhere('c.typeComplement = :type')
               ->setParameter('type', $type);
        }

        if ($archived !== null) {
            $qb->andWhere('c.isArchived = :archived')
               ->setParameter('archived', $archived);
        }

        $qb->orderBy('c.idComplement', 'DESC');

        $countQb = clone $qb;
        $totalItems = (int) $countQb
            ->resetDQLPart('orderBy')
            ->select('COUNT(c.idComplement)')
            ->getQuery()
            ->getSingleScalarResult();

        $rows = $qb->select('c')
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $c) {
            /** @var Complement $c */
            $items[] = new ComplementListItemDto(
                $c->getIdComplement(),
                $c->getNom(),
                $c->getTypeComplement(),
                (string) $c->getPrix(),
                $c->getImage(),
                (bool) $c->isArchived()
            );
        }

        return new PagedResultDto($items, $page, $pageSize, $totalItems);
    }

    public function findById(int $idComplement): ?Complement
    {
        return $this->find($idComplement);
    }

    public function insert(Complement $complement): int
    {
        $em = $this->getEntityManager();
        $em->persist($complement);
        $em->flush();

        return (int) $complement->getIdComplement();
    }

   public function update(Complement $complement): bool
    {
        $this->getEntityManager()->flush();
        return true;
    }

    public function setArchived(int $idComplement, bool $archived): bool
    {
        $em = $this->getEntityManager();
        $c = $this->find($idComplement);

        if (!$c) {
            return false;
        }

        $c->setIsArchived($archived);
        $em->flush();

        return true;
    }
    /**
     * @return SelectItemDto[]
     */
    public function findActiveForSelectByType(TypeComplementEnum $type): array
    {
        $rows = $this->createQueryBuilder('c')
            ->andWhere('c.isArchived = false')
            ->andWhere('c.typeComplement = :type')
            ->setParameter('type', $type)
            ->orderBy('c.nom', 'ASC')
            ->getQuery()
            ->getResult();

        $items = [];
        foreach ($rows as $c) {
            /** @var Complement $c */
            $label = sprintf('%s - %s', $c->getNom(), (string) $c->getPrix());
            $items[] = new SelectItemDto((int) $c->getIdComplement(), $label);
        }

        return $items;
    }

    public function findActiveById(int $idComplement): ?Complement
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.idComplement = :id')
            ->andWhere('c.isArchived = false')
            ->setParameter('id', $idComplement)
            ->getQuery()
            ->getOneOrNullResult();
    }


}
