<?php

namespace App\Repository;

use App\Entity\Leader;
use App\Entity\Language;
use App\Entity\Localization;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Localization|null find($id, $lockMode = null, $lockVersion = null)
 * @method Localization|null findOneBy(array $criteria, array $orderBy = null)
 * @method Localization[]    findAll()
 * @method Localization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalizationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Localization::class);
    }
    
    
    public function findOneByLanguage($leader, $language): ?Localization
    {
        
        return $this->createQueryBuilder('l')
            ->leftJoin('l.language', 'lang')
            ->addSelect('lang')
            ->andWhere('l.leaderId = :leader')
            ->andWhere('lang.languageID = :language')
            ->setParameters([
                ':leader' => $leader->getId(),
                ':language' => $language->getId()
            ])
            
            ->getQuery()
            
            
            ->getOneOrNullResult()
            
                
        ;
    }

    // /**
    //  * @return Localization[] Returns an array of Localization objects
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
    public function findOneBySomeField($value): ?Localization
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
