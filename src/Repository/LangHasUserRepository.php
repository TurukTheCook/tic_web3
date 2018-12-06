<?php

namespace App\Repository;

use App\Entity\LangHasUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LangHasUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method LangHasUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method LangHasUser[]    findAll()
 * @method LangHasUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LangHasUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LangHasUser::class);
    }

    // /**
    //  * @return LangHasUser[] Returns an array of LangHasUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LangHasUser
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
