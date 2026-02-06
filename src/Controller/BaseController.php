<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }
    #[Route('/categorie', name: 'app_categorie')]
    public function categorie(): Response
    {
        return $this->render('base/categorie.html.twig', [

        ]);
    }
}
