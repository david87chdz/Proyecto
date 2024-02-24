<?php

namespace App\Repository;

use App\Entity\Mesa;
use App\Entity\TipoMesa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/*Lo importamos para entityManager*/
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Mesa>
 *
 * @method Mesa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mesa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mesa[]    findAll()
 * @method Mesa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MesaRepository extends ServiceEntityRepository
{
    //Añadimos EntityManagerInterface para poder acceder a las otras entidades 
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Mesa::class);
        $this->entityManager = $entityManager;
    }


     /**
     * Función que devuelve las resermesas de un tamaño o mayores
     * fecha
     * @return array Returns an array of Reserva objects
     */
    public function mesasTamanio($value): array
    {
        $tipoMesa = $this->entityManager->getRepository(TipoMesa::class)->find($value);
        $area=$tipoMesa->getAncho()*$tipoMesa->getLargo();
        
        return $this->createQueryBuilder('m')
            ->join('m.tipomesa', 't')
            ->where('t.ancho * t.largo >= :area')
            ->setParameter('area', $area)
            ->getQuery()
            ->getResult()
        ;

    }

     /**
     * Función que devuelve las mesas por reservas
     * fecha
     * @return array Returns an array of Reserva objects
     */
    public function mesasReservadas($value): array
    {
    return $this->createQueryBuilder('m')
        ->join('m.reservas', 'r')
        ->where('r.fecha_inicio <= :fecha_actual')
        ->andWhere('r.fecha_fin >= :fecha_actual')
        ->setParameter('fecha_actual', $value)
        ->orderBy('r.fecha_inicio', 'ASC')
        ->getQuery()
        ->getResult();
    }

    public function mesaId($id): ?Mesa
    {
        return $this->find($id);
    }

//    /**
//     * @return Mesa[] Returns an array of Mesa objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mesa
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
