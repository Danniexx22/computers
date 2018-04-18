<?php

namespace App\Repository;

use App\Entity\Norm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Norm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Norm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Norm[]    findAll()
 * @method Norm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NormRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Norm::class);
    }

//    /**
//     * @return Norm[] Returns an array of Norm objects
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
    public function findOneBySomeField($value): ?Norm
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
