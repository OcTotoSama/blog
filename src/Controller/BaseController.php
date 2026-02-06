<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
<<<<<<< HEAD
//use App\Form\Commentaire;
use App\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
=======

use App\Form\CategorieType;
use App\Entity\Categorie;

use App\Form\ArticleType;
use App\Entity\Article; 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;




>>>>>>> 4ebb35f5985c9086afce444f4adb09d419bfed24
final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }
<<<<<<< HEAD
    #[Route('/commentaire', name: 'app_commentaire')]
public function commentaire(Request $request,EntityManagerInterface $em): Response
{
    $contact = new Commentaire();
$form = $this->createForm(CommentaireType::class,$commentaire);
if($request->isMethod('POST')){
    $form->handleRequest($request);
    if ($form->isSubmitted()&&$form->isValid()){
        $em->persist($contact);
          $em->flush();
        $this->addFlash('notice','Message envoyé');
        return $this->redirectToRoute('app_contact');
    }
}
    

return $this->render('base/commentaire.html.twig', [
'form' => $form->createView()
]);
}
}
=======
    
    #[Route('/categorie', name: 'app_categorie')]
    public function categorie(Request $request, EntityManagerInterface $em): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class,$categorie);

        

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($categorie);
                $em->flush();
                $this->addFlash('notice','Categorie envoyée');
                return $this->redirectToRoute('app_categorie');
            }
        }
        return $this->render('base/categorie.html.twig', [
            'form'=> $form->createView()

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
>>>>>>> 4ebb35f5985c9086afce444f4adb09d419bfed24
