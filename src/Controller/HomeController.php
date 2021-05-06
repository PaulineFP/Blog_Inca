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
     * @Route("/culture", name="culture")
     */
    public function rituals(): Response
    {
        return $this->render('home/culture.html.twig');
    }

    /**
     * @Route("/culture/religion", name="culture-religion")
     */
    public function pagetwo(): Response
    {
        return $this->render('home/religion.html.twig');
    }

    /**
     * @Route("/culture/autre", name="culture-other")
     */
    public function pagethree(): Response
    {
        return $this->render('home/other.html.twig');
    }

    /**
     * @Route("/legends", name="legends")
     */
    public function legends(): Response
    {
        return $this->render('home/legends.html.twig');
    }

    /**
     * @Route("/touristic", name="touristic")
     */
    public function touristic(): Response
    {
        return $this->render('home/touristic.html.twig');
    }
}
