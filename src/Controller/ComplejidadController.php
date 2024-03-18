<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ComplejidadController extends AbstractController
{
    #[Route('/complejidad', name: 'app_complejidad')]
    public function index(): Response
    {
        return $this->render('complejidad/index.html.twig', [
            'controller_name' => 'ComplejidadController',
        ]);
    }
}
