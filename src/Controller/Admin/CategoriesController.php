<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/admin/categories", name="admin_categories_")
 * @package App\Controller\Admin
 */

class CategoriesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategoriesRepository $catsRepo): Response
    {
        return $this->render('admin/categories/index.html.twig', [
            'categories' => $catsRepo->findAll()
        ]);
    }

    /**
     * @Route("/nouvelle_categorie", name="new_category")
     */

    public function newCategory(Request $request): Response
    {
        $catergorie = new Categories;
        $form = $this->createForm(CategoriesType::class, $catergorie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($catergorie);
            $em->flush();

            return $this->redirectToRoute('admin_categories_home');
        }

        return $this->render('admin/categories/add.html.twig', [
            'form' => $form->createView(),
            ]);
    }

    /**
     * @Route("/modifier/{id}", name="edit")
     */
    public function EditCategory(Categories $categorie, Request $request)
    {
        $form = $this->createForm(CategoriesType::class, $categorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('admin_categories_home');
        }

        return $this->render('admin/categories/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/supprimer/{id}", name="delete")
     */
    public function delete(Categories $categorie): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();

        $this->addFlash('message', 'Catégorie supprimé avec succès');

        return $this->redirectToRoute('admin_categories_homee');
    }



}
