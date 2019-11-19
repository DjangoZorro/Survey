<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/adminindex", name="adminindex")
     */
    public function adminIndex()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        return $this->render('admin/adminindex.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

}
