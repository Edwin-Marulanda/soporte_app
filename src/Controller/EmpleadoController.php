<?php

namespace App\Controller;

use App\Entity\Empleado;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class EmpleadoController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }


    #[Route('/empleado', name: 'app_empleado')]
    public function index(): Response
    {

        $empleados = $this->entityManager->getRepository(Empleado::class)->findEmpleados();
      
        return $this->render('empleado/index.html.twig', [
            'controller_name' => 'EmpleadoController',
            'empleados' => $empleados
        ]);
    }
}
