<?php

namespace Theseus\Bundle\CoreBundle\Manager;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;

use Theseus\Bundle\CoreBundle\Entity\User;
use Theseus\Bundle\CoreBundle\Entity\UserChallenge;
use Theseus\Bundle\CoreBundle\Manager\UserChallengeManager;
use Theseus\Bundle\CoreBundle\Manager\ChallengeManager;
use Theseus\Bundle\CoreBundle\Manager\CompanyManager;
use Theseus\Bundle\CoreBundle\DataImport\Reader\CsvReader;

use Doctrine\ORM\EntityManager;


use \SplFileObject;
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
     * The security Context
     *
     */
    private $securityContext;
    
    /**
     * The challenge manager
     *
     */
    private $challengeManager;
    
    /**
     * The user challenge manager
     *
     */
    private $userChallengeManager;
    
    /**
     * The company manager
     *
     */
    private $companyManager;
    
    /**
     * The constructor
     *
     */
    public function __construct(EntityManager $em, SecurityContext $securityContext,
        ChallengeManager $challengeManager, CompanyManager $companyManager, UserChallengeManager $userChallengeManager)
    {
        $this->em = $em;
        $this->securityContext = $securityContext;
        $this->challengeManager = $challengeManager;
        $this->companyManager = $companyManager;
        $this->userChallengeManager = $userChallengeManager;
    }
    
    /**
     * Check if the logged user has the animation rights for the company
     *
     */
    public function hasCompanyRights($company)
    {
        $user = $this->securityContext->getToken()->getUser();
        $userCompany = $user->getCompanies();
        $hasCompanyRights = false;
        
        if ($userCompany == null) {
            throw new NotFoundHttpException('A user must be linked to a company');
        }
        foreach ($userCompany as $userCompanyEntity) {
            if ($userCompanyEntity->getSlug() == $company) {
                $hasCompanyRights = true;
                break;
            }
        }
        if ($hasCompanyRights == false) {
            throw new AccessDeniedException('You can\'t manage this company');
        }
    }
    
    /**
     * Check credentials: company exists, user is linked to the company, company challenge exists
     *
     */
    public function checkCredentials($company, $challenge = null)
    {
        $this->companyManager->isCompanyExists($company);
        $this->hasCompanyRights($company);
        if ($challenge != null) {
            $this->challengeManager->isCompanyChallengeExists($company, $challenge);
        }
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
     * Save the entity user
     *
     */
    public function saveUser($user, $persist = true)
    {
        if ($persist == true) {
            $this->em->persist($user);
        }
        $this->em->flush();
    }
}