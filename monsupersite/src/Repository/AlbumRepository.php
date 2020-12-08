<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Album|null find($id, $lockMode = null, $lockVersion = null)
 * @method Album|null findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Album::class);
    }

    /**
   * Retrieves top number of products
   *
   * @param integer $number
   * @return Album[] Top products
   */
  public function top(int $number)
  {
    $qb = $this->createQueryBuilder('a') 
      ->orderBy('a.releaseYear', 'DESC')
      ->setMaxResults($number);

    return $qb->getQuery()->getResult();
  }
}
