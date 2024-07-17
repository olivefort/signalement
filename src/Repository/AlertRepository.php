<?php

namespace App\Repository;

use App\Entity\Alert;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Alert>
 */
class AlertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alert::class);
    }

    /**
     * recupere les alertes en lien avec la rechecrhe
     * @return Alert
     */
    public function findSearch(SearchData $search) : array 
    {
        $query = $this
            ->createQueryBuilder('qb');
            // ->select('selection', 'qb')
            // ->join('qb.germe');

        if (!empty($search->field)){
            $query = $query
                ->andWhere('qb.germe LIKE :field')
                ->setParameter('field', "%{$search->field}%");
        }
        return $query->getQuery()->getResult();
        return $this->findAll();
    }
}