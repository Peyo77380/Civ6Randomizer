<?php

namespace App\Repository;

use App\Entity\LeaderTranslateCountry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LeaderTranslateCountry|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeaderTranslateCountry|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeaderTranslateCountry[]    findAll()
 * @method LeaderTranslateCountry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeaderTranslateCountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LeaderTranslateCountry::class);
    }

    // /**
    //  * @return LeaderTranslateCountry[] Returns an array of LeaderTranslateCountry objects
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
    public function findOneBySomeField($value): ?LeaderTranslateCountry
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
