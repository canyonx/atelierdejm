<?php

namespace App\Repository;

use App\Entity\Featurette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Featurette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Featurette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Featurette[]    findAll()
 * @method Featurette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeaturetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Featurette::class);
    }

    // /**
    //  * @return Featurette[] Returns an array of Featurette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Featurette
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
