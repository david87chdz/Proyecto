<?php

namespace App\Repository;

use App\Entity\Reserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reserva>
 *
 * @method Reserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserva[]    findAll()
 * @method Reserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reserva::class);
    }

    /**
     * Función que devuelve las reservas de un usuario ordenadas por
     * fecha
     * @return array Returns an array of Reserva objects
     */
    public function reservasUsuarios($value): array
    {
        return $this->createQueryBuilder('r')
            ->join('r.usuario', 'u')
            ->where('u.nombre = :val')
            ->setParameter('val', $value)
            ->orderBy('r.fecha_inicio', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }



    /**
     * Función que devulve las reservas de todos (para los admin)
     * ordenadas por fecha
     * @return array;
     */
    public function reservasAdmin():array
    {
        return $this->createQueryBuilder('r')
        ->orderBy('r.fecha_inicio', 'ASC')
        ->getQuery()
        ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?Reserva
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
