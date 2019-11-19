<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Repository\SurveyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MehmetController extends AbstractController
{
    /**
     * @Route("/", name="mehmet")
     */
    public function index(QuestionRepository $questionRepository)
    {
        $repository = $this->getDoctrine()->getRepository(Question::class)->findAll();

        return $this->render('mehmet.html.twig', [
            'controller_name' => 'MehmetController',
            'question' => $repository,
        ]);
    }

    /**
     * @Route("/admin", name="mehmet")
     */
    public function adminIndex()
    {
        return $this->render('mehmet.html.twig', [
            'controller_name' => 'MehmetController',
        ]);
    }
}
