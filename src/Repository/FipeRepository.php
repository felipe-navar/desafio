<?php

namespace App\Repository;

use App\Entity\Fipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fipe>
 */
class FipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fipe::class);
    }

    public function pegarHistorico(){
        $con = $this->getEntityManager()->getConnection();
        
        $query = 'SELECT historico FROM fipe';

        

        $resultSet = $con->executeQuery($query);

        $resultSet = $resultSet->fetchAllAssociative();
        
        return $resultSet;

    }

    //    /**
    //     * @return Fipe[] Returns an array of Fipe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Fipe
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
