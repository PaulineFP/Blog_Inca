<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Form\ItemsType;
use App\Repository\ItemsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin/articles", name="admin_items_")
 * @package App\Controller\Admin
 */

class ItemsController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ItemsRepository $itsRepo): Response
    {
        return $this->render('admin/items/index.html.twig', [
            'articles'=> $itsRepo->findAll()
        ]);
    }

    /**
     * @Route("/activer/{id}", name="activer")
     */
    public function activate(Articles $article): Response
    {
        $article->setActive(($article->getActive())?false:true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response("true");
    }

    /**
     * @Route("admin/nouvelle_article", name="new_item")
     */

    public function newItem(Request $request): Response
    {
        $article = new Articles;
        $form = $this->createForm(ItemsType::class, $article);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $article->setUsers($this->getUser());
            $article->setActive(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_items_home');
        }

        return $this->render('admin/items/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/modifier/{id}", name="edit")
     */
    public function EditCategory(Articles $article, Request $request)
    {
        $form = $this->createForm(ItemsType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_items_home');
        }

        return $this->render('admin/items/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="delete")
     */
    public function delete(Articles $article): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();

        $this->addFlash('message', 'Article supprimé avec succès');

        return $this->redirectToRoute('admin_items_home');
    }

}
