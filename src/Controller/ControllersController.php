<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllersController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'ControllersController',
        ]);
    }

    /**
     * @Route("/", name="app_history")
     */
    public function index(): Response
    {
        return $this->render('home/history.html.twig', [
            'controller_name' => 'ControllersController',
        ]);
    }
}