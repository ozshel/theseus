<?php

namespace Theseus\Bundle\CoreBundle\Manager;

use Theseus\Bundle\CoreBundle\Entity\User;

use Doctrine\ORM\EntityManager;

use \DateTime;

/**
 * @package Theseus\Bundle\CoreBundle\Manager
 */
class UserManager
{
    /**
     * The related Model
     *
     */
    private static $model = 'TheseusCoreBundle:User';
    
    /**
     * The entity Manager
     *
     */
    private $em;          
    
    /**
     * The constructor
     *
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }    
    
    /**
     * Get User infos
     *
     */
    public function findOneBy($finder)
    {
        $user = $this->em->getRepository(self::$model)->findOneBy($finder);
        
        return $user;
    }
    
    /**
     * Get List Users
     *
     */
    public function getList()
    {
        $user = $this->em->getRepository(self::$model)->getList();
        
        return $user;
    }
}