<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
//use App\Form\Commentaire;
use App\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }
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
