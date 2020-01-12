<?php

namespace App\Repository;

use App\Entity\CorrectiveAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CorrectiveAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method CorrectiveAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method CorrectiveAction[]    findAll()
 * @method CorrectiveAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CorrectiveActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CorrectiveAction::class);
    }

    // /**
    //  * @return CorrectiveAction[] Returns an array of CorrectiveAction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CorrectiveAction
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
