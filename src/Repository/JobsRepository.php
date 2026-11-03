<?php

namespace App\Repository;

use App\Entity\Jobs;
use Enhavo\Bundle\ResourceBundle\Repository\EntityRepository;

/**
 * @method Jobs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobs[]    findAll()
 * @method Jobs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobsRepository extends EntityRepository
{
    /**
     * Returns public jobs, optionally restricted to those having an Abteilung
     * whose name is in $tagNames. Newest first, limited to $limit.
     *
     * @param string[] $tagNames
     * @return Jobs[]
     */
    public function findPublicJobs(array $tagNames = [], ?int $limit = null): array
    {
        $qb = $this->createQueryBuilder('j')
            ->andWhere('j.public = :public')
            ->setParameter('public', true)
            ->orderBy('j.id', 'DESC');

        if (count($tagNames) > 0) {
            $qb->innerJoin('j.abteilungen', 'a')
                ->andWhere('a.name IN (:tagNames)')
                ->setParameter('tagNames', $tagNames)
                ->distinct();
        }

        if ($limit !== null) {
            $qb->setMaxResults($limit);
        }

        return $qb->getQuery()->getResult();
    }
}
