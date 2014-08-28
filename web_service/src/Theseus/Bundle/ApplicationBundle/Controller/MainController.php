<?php

namespace Theseus\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use JMS\SecurityExtraBundle\Annotation\Secure;

use Theseus\Bundle\CoreBundle\Entity\User;
use Theseus\Bundle\CoreBundle\Entity\Group;

/**
 * @package Theseus\Bundle\ApplicationBundle\Controller
 */
class MainController extends Controller
{
    /**
     * Display the home page
     * 
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/")
     */
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        var_dump($user);die();
        foreach($user->getGroups() as $group)
        {
//            var_dump($group);
        }
//        die();
        $array = [
            'test' => 245,
            'user' => $user
        ];

        return new JsonResponse($array);
    }
}

