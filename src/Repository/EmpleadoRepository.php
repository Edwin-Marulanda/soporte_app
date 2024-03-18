<?php

namespace App\Repository;

use App\Entity\Empleado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Empleado>
 *
 * @method Empleado|null find($id, $lockMode = null, $lockVersion = null)
 * @method Empleado|null findOneBy(array $criteria, array $orderBy = null)
 * @method Empleado[]    findAll()
 * @method Empleado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpleadoRepository extends ServiceEntityRepository
{
    private $entityManager;


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empleado::class);
    }

    //    /**
    //     * @return Empleado[] Returns an array of Empleado objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Empleado
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findEmpleados()
    {
        return $this->getEntityManager()
            ->createQuery('
            SELECT emp.id, emp.nombre, SUM(com.valor) as acumulado 
            FROM App\Entity\Soporte sop 
            JOIN sop.emp emp 
            JOIN sop.comp com 
           
            GROUP BY emp.id
        ')->getResult();

    }

    /**
     *  WHERE DATE(sop.fecha) = DATE(CURRENT_DATE()) 
     * select emp.id,emp.nombre , sum(com.valor) as acumulado 
        from App:Soporte sop join App:Empleado emp on sop.emp_id = emp.id
        join App:Complejidad com on sop.comp_id = com.id
        where DATE(sop.fecha) = CURDATE()
        group by emp.id
     */

    function empleadoMenorTrabajoService()
    {
        $url = 'http://localhost:8080/api/empleado/menortrabajo';
        $json = file_get_contents($url);
        $empleado = json_decode($json, true);
        return $empleado;
    }
}
