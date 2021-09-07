<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\RepositoryTrait;

trait Count
{
    /**
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function count(): int
    {
        /** @var \Doctrine\ORM\QueryBuilder $qb */
        $qb = $this->createQueryBuilder('e');
        $qb->select('count(e.id)');

        return (int) $qb->getQuery()->getSingleScalarResult();
    }
}
