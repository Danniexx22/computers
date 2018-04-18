<?php

namespace App\Repository;

use App\Entity\Nor2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Nor2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nor2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nor2[]    findAll()
 * @method Nor2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Nor2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nor2::class);
    }

//    /**
//     * @return Nor2[] Returns an array of Nor2 objects
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
    public function findOneBySomeField($value): ?Nor2
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
