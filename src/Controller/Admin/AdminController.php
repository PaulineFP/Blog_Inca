<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    /**
     * @Route("/admin/connexion", name="connexion")
     */
    public function connexion(): Response
    {
        return $this->render('admin/connexion.html.twig');
    }

    /**
     * @Route("/admin/create", name="create")
     */
    public function create(ArticleRepository $articleRepository): Response
    {
//      --Je crée un article---
        $article = (new Article())
            ->setTitle("ceci est le titre de l'article")
            ->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

//         --J'envoie à ma vue tout ce que j'ai en BDD--
        return $this->render('admin/create.html.twig', [
            'article'=> $articleRepository->findAll()
        ]);
    }
}
