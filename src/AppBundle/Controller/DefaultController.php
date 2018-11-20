<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Persona;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $persona = new Persona();
        $persona
            ->setNombre('Juan')
            ->setApellidos('Nadie Nadie')
            ->setEdad(20)
            ->setCif('12345678A');

        $em = $this->getDoctrine()->getManager();

        $em->persist($persona);
        $em->flush();

        return new Response("Creada persona con el id ". $persona->getId());
    }
}
