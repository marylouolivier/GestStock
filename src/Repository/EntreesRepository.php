<?php

namespace App\Repository;

use App\Entity\Entrees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Entrees|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrees|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrees[]    findAll()
 * @method Entrees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntreesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrees::class);
    }

    // /**
    //  * @return Entrees[] Returns an array of Entrees objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Entrees
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
