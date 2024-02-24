<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Usuario>
 *
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }



    /* public function rolSocio($nombreRol)
    {
        return $this->createQueryBuilder('u')
    ->innerJoin('u.rol', 'r', 'WITH', 'r.nombre = :nombre')
    ->setParameter('nombre', $nombreRol)
    ->getQuery()
    ->getOneOrNullResult();
    } */

    /**
     * Función que nos devuelve el rol socio
     */
    public function rolSocio($nombreRol)
    {
    return $this->getEntityManager()
        ->createQuery(
            'SELECT r FROM App\Entity\Rol r WHERE r.nombre = :nombre'
        )
        ->setParameter('nombre', $nombreRol)
        ->getOneOrNullResult();
    }


    public function usuarioId($id): ?Usuario
    {
        return $this->find($id);
    }

}




//    /**
//     * @return Usuario[] Returns an array of Usuario objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Usuario
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
//}
