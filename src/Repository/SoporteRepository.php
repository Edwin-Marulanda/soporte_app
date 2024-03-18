<?php

namespace App\Repository;

use App\Entity\Soporte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Soporte>
 *
 * @method Soporte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soporte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soporte[]    findAll()
 * @method Soporte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoporteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soporte::class);
    }

    //    /**
    //     * @return Soporte[] Returns an array of Soporte objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Soporte
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
