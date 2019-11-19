<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VragenlijstController extends AbstractController
{
    /**
     * @Route("/vragenlijst", name="vragenlijst")
     */
    public function index()
    {
        return $this->render('vragenlijst/index.html.twig', [
            'controller_name' => 'VragenlijstController',
        ]);
    }
}
