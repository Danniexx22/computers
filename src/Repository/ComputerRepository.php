<?php

namespace App\Repository;

use App\Entity\Computer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Computer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Computer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Computer[]    findAll()
 * @method Computer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComputerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Computer::class);
    }

       /**
   	   * @return Computer[] Returns an array of Computer objects
       */
       
    
    public function findLikeSerie($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.serie LIKE :val')
            ->setParameter('val','%'.$value.'%')
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Computer[] Returns an array of Categoria objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categoria
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
