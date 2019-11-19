<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Survey;
use App\Repository\ChoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Routing\Annotation\Route;

class SurveyController extends AbstractController
{
    /**
     * @Route("/survey", name="survey")
     */
    public function index()
    {
        return $this->render('survey/index.html.twig', [
            'controller_name' => 'SurveyController',
        ]);
    }

    /**
     * @Route("/survey/{id}", name="survey_see")
     */
    public function survey(Survey $survey, ChoiceRepository $choiceRepository)
    {
        $questions = $survey->getQuestions();
        $formbuilder = $this->createFormBuilder();
        $i = 0;

        foreach ($questions as $question) {
            $i = $i + 1;
            if ($question->getType()->getName() == "text") {
                $formbuilder->add('answer' . $i, TextType::class, array(
                    'required' => false,
                    'label' => $question->getDescription()
                ));
            }
            elseif ($question->getType()->getName() == "radio") {
                $formbuilder->add('answer' . $i, RadioType::class, array(
                    'required' => false,
                    'label' => $question->getDescription()
                ));
            }
            elseif ($question->getType()->getName() == "choice") {
                $formbuilder->add('answer' . $i, ChoiceType::class, array(
                    'choices' => $question->getChoices(),
                    'required' => false,
                    'label' => $question->getDescription(),
                    'expanded' => true,
                    'multiple' => false
                ));
            }
            elseif ($question->getType()->getName() == "select") {
                $formbuilder->add('answer' . $i, CheckboxType::class, array(
                    'required' => false,
                    'label' => $question->getDescription()
                ));
            }
        }
        $formbuilder->add('submit', SubmitType::class, array(
            'label' => 'Inleveren'
        ));
        $form = $formbuilder->getForm();

        return $this->render('survey/survey.html.twig', [
            'survey' => $survey,
            'form' => $form->createView(),
            'questions' => $questions,
        ]);
    }
}
