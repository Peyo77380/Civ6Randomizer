<?php

namespace App\Repository;

use App\Entity\Leader;
use App\Entity\Language;
use App\Entity\LeaderTranslate;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method LeaderTranslate|null find($id, $lockMode = null, $lockVersion = null)
 * @method LeaderTranslate|null findOneBy(array $criteria, array $orderBy = null)
 * @method LeaderTranslate[]    findAll()
 * @method LeaderTranslate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeaderTranslateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LeaderTranslate::class);
    }

    /**
     * @return LeaderTranslate from Leaders ID and Language
     */
    public function findOneByLanguage(Leader $leader, string $languageIso): ?LeaderTranslate
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.leader = :leader')
            ->andWhere('l.language = :language')
            ->setParameter('leader', $leader)
            ->setParameter('language', $languageIso)
            ->getQuery()

            ->getOneOrNullResult()
            
        ;
    }
    // /**
    //  * @return LeaderTranslate[] Returns an array of LeaderTranslate objects
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
    public function findOneBySomeField($value): ?LeaderTranslate
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
