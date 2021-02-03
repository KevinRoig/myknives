<?php

namespace App\Repository;

use App\Entity\Knife;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Knife|null find($id, $lockMode = null, $lockVersion = null)
 * @method Knife|null findOneBy(array $criteria, array $orderBy = null)
 * @method Knife[]    findAll()
 * @method Knife[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KnifeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Knife::class);
    }

    // /**
    //  * @return Knife[] Returns an array of Knife objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Knife
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
