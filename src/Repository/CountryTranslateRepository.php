<?php

namespace App\Repository;

use App\Entity\CountryTranslate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CountryTranslate|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountryTranslate|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountryTranslate[]    findAll()
 * @method CountryTranslate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryTranslateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CountryTranslate::class);
    }

    // /**
    //  * @return CountryTranslate[] Returns an array of CountryTranslate objects
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
    public function findOneBySomeField($value): ?CountryTranslate
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
