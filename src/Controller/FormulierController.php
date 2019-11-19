<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulierController extends AbstractController
{
    /**
     * @Route("/formulier", name="formulier")
     */
    public function index()
    {
        return $this->render('formulier/index.html.twig', [
            'controller_name' => 'FormulierController',
        ]);
    }
}
