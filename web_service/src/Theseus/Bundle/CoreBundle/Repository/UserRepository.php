<?php

namespace Theseus\Bundle\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @package Theseus\Bundle\CoreBundle\Repository
 */
class UserRepository extends EntityRepository
{    
    public function getList()
    {
        $qb = $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
        
        return $qb;
    }
}