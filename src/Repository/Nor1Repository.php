<?php

namespace App\Repository;

use App\Entity\Nor1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Nor1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nor1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nor1[]    findAll()
 * @method Nor1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Nor1Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nor1::class);
    }

//    /**
//     * @return Nor1[] Returns an array of Nor1 objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Nor1
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
