<?php

namespace App\Repository;

use App\Entity\LeaderTranslateName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LeaderTranslateName|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeaderTranslateName|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeaderTranslateName[]    findAll()
 * @method LeaderTranslateName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeaderTranslateNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LeaderTranslateName::class);
    }

    // /**
    //  * @return LeaderTranslateName[] Returns an array of LeaderTranslateName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LeaderTranslateName
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
