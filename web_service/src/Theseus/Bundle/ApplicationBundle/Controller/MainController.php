<?php

namespace Theseus\Bundle\ApplicationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @package Theseus\Bundle\ApplicationBundle\Controller
 * @version 0.1
 */
class MainController extends Controller
{
    /**
     * Display the home page
     * 
     * @Route("/")
     */
    public function indexAction()
    {
        
        $array = ['test' => 245];

        return new JsonResponse($array);
    }
}

