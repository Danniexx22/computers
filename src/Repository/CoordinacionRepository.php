<?php

namespace App\Repository;

use App\Entity\Coordinacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Coordinacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coordinacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coordinacion[]    findAll()
 * @method Coordinacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoordinacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Coordinacion::class);
    }

//    /**
//     * @return Coordinacion[] Returns an array of Coordinacion objects
//     */
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
    public function findOneBySomeField($value): ?Coordinacion
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
