<?php

namespace App\Repository;

use App\Entity\TipoMesa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoMesa>
 *
 * @method TipoMesa|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoMesa|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoMesa[]    findAll()
 * @method TipoMesa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoMesaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoMesa::class);
    }

//    /**
//     * @return TipoMesa[] Returns an array of TipoMesa objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TipoMesa
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
