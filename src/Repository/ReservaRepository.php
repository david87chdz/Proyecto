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
    public function reservasUsuariosNombre($value): array
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
     * Función que devuelve las reservas de un usuario ordenadas por
     * fecha
     * @return array Returns an array of Reserva objects
     */
    public function reservasUsuarios($id): array
    {
        return $this->createQueryBuilder('r')
        ->join('r.usuario', 'u')
        ->where('u.id = :idUsuario')
        ->setParameter('idUsuario', $id)
        ->orderBy('r.fecha_inicio', 'ASC') // Asumiendo que 'fechaInicio' es el nombre de la propiedad en la entidad Reserva
        ->getQuery()
        ->getResult();
    }



     /**
     * Función que devuelve el id de la persona que esta haciendo la peticion de reservas
     * fecha
     * @return string Returns an string of Reserva user rol
     */
    public function admin($id): string
    {
        return $this->createQueryBuilder('r')
        ->select('DISTINCT rol.nombre AS nombre_rol')
        ->join('r.usuario', 'u')
        ->join('u.rol', 'rol')
        ->where('u.id = :usuario_id')
        ->setParameter('usuario_id', $id)
        ->getQuery()
        ->getSingleScalarResult();
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


    public function juegoId($idJuego)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT j FROM App\Entity\Juego j WHERE j.id = :idJuego'
            )
            ->setParameter('idJuego', $idJuego)
            ->setMaxResults(1) // Establece el máximo de resultados a 1
            ->getOneOrNullResult();
    }

    public function mesaId($idmesa)
    {
        return $this->createQueryBuilder('r')
            ->leftJoin('r.mesa', 'm') // Unir la tabla de Juegos
            ->andWhere('m.id = :idMesa')
            ->setParameter('idMesa', $idmesa)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    
    public function usuarioId($idusuario)
    {
        return $this->createQueryBuilder('r')
            ->leftJoin('r.usuario', 'u') // Unir la tabla de Juegos
            ->andWhere('u.id = :idUsuario')
            ->setParameter('idUsuario', $idusuario)
            ->getQuery()
            ->getOneOrNullResult();
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
