<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 4/14/2018
 * Time: 11:00 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\EvalRes;
use AppBundle\Entity\Evaluation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Score;

class MemberController extends Controller
{
    //Loading the training session and preparing variables
    public function FormationStartAction($id, $pagenb, Request $request)
    {
        if ($id == -1) {
            return $this->redirectToRoute('formsavailable');
        }
        $request->getSession()->set('current_form_id', $id);
        $request->getSession()->set('current_step', 1);
        if ($pagenb == 1)
            $request->getSession()->set('current_score', 0);
        $em = $this->getDoctrine()->getManager();
        $content = $em->getRepository('AppBundle:Content')->findOneBy(array('form' => $id, 'pageNb' => $pagenb));
        if ($content == null) return $this->redirectToRoute('formsavailable');
        return $this->render(':Member:form_lesson.html.twig', array('content' => $content));
    }

    // In this method we load questions for a user
    public function QuestionAction($id, Request $request)
    {
//        if($id == -1 || $request->getSession()->get('current_form_id') === null || $id != $request->getSession()->get('current_step')) return $this->redirectToRoute('formsavailable');

        $em = $this->getDoctrine()->getManager();
        $form = $em->getRepository('AppBundle:Formation')->findOneBy(array('formId' => $request->getSession()->get('current_form_id')));
        if ($form === null) return $this->redirectToRoute('formsavailable');
        $question = $em->getRepository('AppBundle:Questions')->findOneBy(array('pagenumber' => $id, 'formid' => $form)); //and verify the form id
        if ($question == null) return $this->redirectToRoute('formsavailable');
        return $this->render(':Member:form_question.html.twig', array('question' => $question));
    }

    // in this Method we display correct the question answered by the user and increment the score by 10 if true
    public function CorrectionAction($id, Request $request)
    {
//        if($id == -1 || $request->getSession()->get('current_form_id') === null || $id != $request->getSession()->get('current_step')) return $this->redirectToRoute('formsavailable');

        $session = $this->get('session');
        $em = $this->getDoctrine()->getManager();
        $form = $em->getRepository('AppBundle:Formation')->findOneBy(array('formId' => $request->getSession()->get('current_form_id')));
//        if($form === null) return $this->redirectToRoute('formsavailable');
        $question = $em->getRepository('AppBundle:Questions')->findOneBy(array('pagenumber' => $id, 'formid' => $form)); //and verify the form id
//        if($question == null) return $this->redirectToRoute('formsavailable');
        $answer = $request->get('choice');
        $content = $em->getRepository('AppBundle:Content')->findOneBy(array('pageNb' => $id, 'form' => $form));
        $verdict = ($answer == $question->getAnswer());
        $current_score = $session->get('current_score');
        if ($verdict) {
            dump('true');
            $session->set('current_score', (int)($current_score + 10));
        }
        $current_step = $session->get('current_step');
        $request->getSession()->set('current_step', $current_step + 1);
        $this->container->set('session', $session);
        dump($session->get('current_score'));
        return $this->render(':Member:form_correction.html.twig', array('question' => $question, 'content' => $content, 'verdict' => $verdict));
    }

    // In this Method we acquire the result and persist it to the database under table Score as well as updating the about table with
    //skills if the user got over 70 points in his training session
    public function ResultAction($id, Request $request)
    {
        if ($id == -1 || $request->getSession()->get('current_form_id') === null || $id != $request->getSession()->get('current_step')) return $this->redirectToRoute('formsavailable');

        $em = $this->getDoctrine()->getManager();
        $form = $em->getRepository('AppBundle:Formation')->findOneBy(array('formId' => $request->getSession()->get('current_form_id')));
        $skills = $form->getGivenskills();
        if ($form === null) return $this->redirectToRoute('formsavailable');
        $current_score = $request->getSession()->get('current_score');
        $score = new Score();
        $score->setFormidScore($form);
        $score->setUserScore($this->getUser());
        $score->setPts($current_score);
        $em->persist($score);
        $em->flush();
        $em = $this->getDoctrine()->getManager();
        $about = $em->getRepository('AppBundle:About')->findOneBy(array('aboutuserid' => $this->getUser()->getId()));
        $about->setAcquiredskills($skills);
        $em->persist($about);
        $em->flush();
        return $this->render(':Member:form_last.html.twig', array('score' => $current_score, 'formation' => $form));

    }
    //In this method we display the evaluation from the table Evaluation and persist the answers in the database under the table EvalRes
    public function evaluationAction($id, Request $request)
    {
        if ($id == -1 || $request->getSession()->get('current_form_id') === null || $id != $request->getSession()->get('current_step')) return $this->redirectToRoute('formsavailable');

        $em = $this->getDoctrine()->getManager();
        $eval1 = $em->getRepository('AppBundle:Evaluation')->findOneBy(array('formid' => $id));
        $eval = new EvalRes();
        $form = $this->createForm('AppBundle\Form\EvalResType', $eval);
        $formation = $em->getRepository('AppBundle:Formation')->findOneBy(array('formId' => $request->getSession()->get('current_form_id')));
        if ($form === null) return $this->redirectToRoute('formsavailable');

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $eval->setEvalEval($em->getRepository('AppBundle:Evaluation')->findOneBy(array('evalId' => $request->getSession()->get('current_form_id'))));
            $eval->setIdEvalUser($this->getUser());
            $em->persist($eval);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render(':Member:form_eval.html.twig', array('form' => $form->createView(), 'eval' => $eval1, 'formation' => $formation));
    }

    // In this method we display the evaluation result for the supervisor in the dashboard
    public function showevalAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository('AppBundle:Formation')->findOneBy(array("formId" => $id));
        $questions = $em->getRepository('AppBundle:Evaluation')->findOneBy(array("formid" => $formation));
        $evalres = $em->getRepository('AppBundle:EvalRes')->findBy(array('evalEval' => $questions));
        return $this->render(':Supervisor:evaldisplay.html.twig', array('questions' => $questions, 'evalres' => $evalres));
    }


}