<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


use App\Form\ArticleType;
use App\Entity\Article; 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;




final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }

   
    #[Route('/article', name: 'app_article')]
    public function article(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article(); /*avec la première lettre en majuscule pour le deuxième nom*/
        $form = $this->createForm(ArticleType::class,$article);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($article);
                $em->flush();
                $this->addFlash('notice','Formulaire envoyé');
                return $this->redirectToRoute('app_article');
            }
        }
        return $this->render('base/article.html.twig', [
            'form' => $form->createView()
        ]);
    }



}
