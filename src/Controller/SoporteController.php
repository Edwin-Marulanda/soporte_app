<?php

namespace App\Controller;

use App\Entity\Empleado;
use App\Entity\Soporte;
use App\Form\SoporteType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SoporteController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/soporte', name: 'app_soporte')]
    public function index(Request $request): Response
    {

        $diaActual = new DateTime();
        $empleado = new Empleado();
        
        $soportes = $this->em->getRepository(Soporte::class)->findAll();
        $soporte = new Soporte();

        $empleadoMenorOcupacion = $this->em->getRepository(Empleado::class)->empleadoMenorTrabajoService();
        
        $empleado->setId($empleadoMenorOcupacion["id"]);
        $empleado->setNombre($empleadoMenorOcupacion["nombre"]);

        //$soporte ->setEmp($empleado);
        $soporte->setFecha($diaActual);

        $formulario =  $this->createForm(SoporteType::class, $soporte);
        $formulario->handleRequest($request);
        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $this->em->persist($soporte);
            $this->em->flush();
            return $this->redirectToRoute('app_soporte');
        }

        return $this->render('soporte/index.html.twig', [
            'controller_name' => 'SoporteController', 'fomulario' => $formulario->createView(),
            'soportes' => $soportes, 'empleado' => $empleado
        ]);
    }
}
