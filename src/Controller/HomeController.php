<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/history", name="history")
     */
    public function history(): Response
    {
        return $this->render('home/history.html.twig');
    }

    /**
     * @Route("/legends", name="legends")
     */
    public function legends(): Response
    {
        return $this->render('home/legends.html.twig');
    }

    /**
     * @Route("/rituals", name="rituals")
     */
    public function rituals(): Response
    {
        return $this->render('home/rituals.html.twig');
    }

    /**
     * @Route("/touristic", name="touristic")
     */
    public function touristic(): Response
    {
        return $this->render('home/touristic.html.twig');
    }
}
