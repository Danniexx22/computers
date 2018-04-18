<?php

namespace App\Repository;

use App\Entity\Jefatura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jefatura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jefatura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jefatura[]    findAll()
 * @method Jefatura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JefaturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jefatura::class);
    }

//    /**
//     * @return Jefatura[] Returns an array of Jefatura objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jefatura
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
