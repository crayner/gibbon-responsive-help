<?php

namespace App\Repository;

use App\Entity\GibbonHelp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GibbonHelp|null find($id, $lockMode = null, $lockVersion = null)
 * @method GibbonHelp|null findOneBy(array $criteria, array $orderBy = null)
 * @method GibbonHelp[]    findAll()
 * @method GibbonHelp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GibbonHelpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GibbonHelp::class);
    }

    // /**
    //  * @return GibbonHelp[] Returns an array of GibbonHelp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GibbonHelp
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
