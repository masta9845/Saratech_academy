<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursController extends AbstractController
{
    // #[Route('/cours{id}', name: 'app_cours')] paramettre de la route
    #[Route('/cours', name: 'app_cours')]
    public function index(): Response
    {
        return $this->render('admin/cours.html.twig', [
           
        ]);
    }
}
