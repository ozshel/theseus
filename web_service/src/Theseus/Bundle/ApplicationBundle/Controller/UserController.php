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
class UserController extends Controller
{
    /**
     * Display the users list page
     * 
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/list")
     */
    public function listAction()
    {
        /* Get User logged */
        $user = $this->get('security.context')->getToken()->getUser();

        /* Get List of users */
        $users = $this->container->get('theseus.user_manager')->getList();

        $array = [];
        $datas = array();
        foreach($users as $user)
        {
            $data['id'] = $user->getId();
            $data['firstname'] = $user->getFirstname();
            $data['lastname'] = $user->getLastname();
            if($user->getBirthday() != null) {
                $data['birthday'] = $user->getBirthday()->format('Y-m-d');
            } else {
                $data['birthday'] = '';
            }
            $data['phone'] = $user->getPhone();
            $data['created_at'] = $user->getCreatedAt()->format('Y-m-d H:i:s');
            $address = $user->getAddress();

            if($address != null) {

                $userAdddress['address'] = $address->getAddress();
                $userAdddress['city'] = $address->getCity();
                $userAdddress['country'] = $address->getCountry();
                $userAdddress['additionalAddress'] = $address->getAdditionalAddress();
                
                $data['address'] = $userAdddress;
            } else {
                $data['address'] = null;
            }
            $groups = array();
            foreach($user->getGroups() as $group) {
                $role = $group->getRoles();
                $groups[] = $role[0];
                $data['group'][] = $role;
            }
            $data['group'] = $groups;
            $datas[] = $data;
        }
        
        $array['data'] = $datas;
        
        return new JsonResponse($array);
    }
}

