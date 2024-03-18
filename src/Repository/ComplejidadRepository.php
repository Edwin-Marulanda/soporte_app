<?php

namespace App\Repository;

use App\Entity\Complejidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Complejidad>
 *
 * @method Complejidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Complejidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Complejidad[]    findAll()
 * @method Complejidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplejidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Complejidad::class);
    }

    //    /**
    //     * @return Complejidad[] Returns an array of Complejidad objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Complejidad
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
