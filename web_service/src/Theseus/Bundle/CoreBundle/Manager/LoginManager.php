<?php

namespace Theseus\Bundle\CoreBundle\Manager;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Routing\Router;

/**
 * @package Theseus\Bundle\CoreBundle\Manager
 */
class LoginManager implements AuthenticationSuccessHandlerInterface
{
    /**
     * The router
     *
     */
    private $router;   
    
    /**
     * The doctrine Registry
     *
     */
    private $doctrine;
    
    /**
     * The constructor
     *
     */
    public function __construct(Router $router, $doctrine)
    {
//        echo 1;exit;
        $this->router = $router;
        $this->doctrine = $doctrine;
    }
    
    /**
     * Redirect to a specific url depending on the user roles
     *
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();
//        $session = $request->getSession();        

        $roles = $token->getRoles();
  
        $redirect = $this->getRedirectUrl($roles, $user);
        
        return $redirect;
    }    

    /**
     * Get the redirect url based on User Roles
     *
     */
    private function getRedirectUrl($roles, $user)
    {
//        echo 3;exit;
        $redirect = new RedirectResponse($this->router->generate('theseus_application_main_index'));        
        return $redirect;
        foreach ($roles as $role) {
            if ($role->getRole() == 'ROLE_ANIMATEUR') {
                $redirect = new RedirectResponse($this->router->generate('ideastim_animation_main_home', array('company' => $company)));
                return $redirect;
            } else if ($role->getRole() == 'ROLE_PARTICIPANT') {
                if ($user->getFirstLogin() == null) {
                    $redirect = new RedirectResponse($this->router->generate('ideastim_participation_login_firstlogin', array('company' => $company)));
                    return $redirect;
                } else {
                    $redirect = new RedirectResponse($this->router->generate('ideastim_participation_main_home', array('company' => $company)));
                    return $redirect;
                }
            }
        }
        
        return $redirect;
    }
}