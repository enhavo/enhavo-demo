<?php

namespace App\Repository;

use App\Entity\NagScreen;
use Enhavo\Bundle\ResourceBundle\Repository\EntityRepository;

/**
 * @method NagScreen|null find($id, $lockMode = null, $lockVersion = null)
 * @method NagScreen|null findOneBy(array $criteria, array $orderBy = null)
 * @method NagScreen[]    findAll()
 * @method NagScreen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NagScreenRepository extends EntityRepository
{
    public function findActive(?\DateTimeInterface $now = null ): ?NagScreen
    {
        $now = $now ?? new \DateTime();

        return $this->createQueryBuilder('n')
              ->andWhere('n.public = :public')->setParameter('public', true)
              ->andWhere('(n.runFrom IS NULL OR n.runFrom <= :now)')
              ->andWhere('(n.runTo IS NULL OR n.runTo >= :now)')
              ->setParameter('now', $now)
              ->orderBy('n.id', 'DESC')
              ->setMaxResults(1)
              ->getQuery()
              ->getOneOrNullResult();
    }
}
