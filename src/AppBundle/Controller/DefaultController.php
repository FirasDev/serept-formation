<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use AppBundle\Entity\Score;


class DefaultController extends Controller
{
    /**
     * @Route("/home", name="homepage2")
     */
    public function indexAction(Request $request)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $score = $em->getRepository('AppBundle:Score')->findBy(array('userScore' => $user));
        $em = $this->getDoctrine()->getManager();
        $myforms = [];
        if($this->isGranted("ROLE_SUPERVISOR")){
            $sessions = $em->getRepository("AppBundle:Session")->findBy(array("sessionmanager" => $this->getUser()));
            foreach ($sessions as $s){
                $mf = $em->getRepository("AppBundle:Formation")->findBy(array("sess" => $s));
                if(count($mf) > 0) array_push($myforms,$mf);
            }
        }
        $formation = $em->getRepository('AppBundle:Formation')->findBy(array('formId' => $score));
        return $this->render('serept/dashboard.html.twig',array('myforms' => $myforms,'score' => $score,'user' => $user,'formation' => $formation));

    }

    //in this method we load the scores from the score table for the user in each Training session passed
    // as well as the training sessions created by him if he is a supervisor

    /**
     * @Route("/", name="homepage")
     */
    public function secondindexAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $score = $em->getRepository('AppBundle:Score')->findBy(array('userScore' => $user));
        $em = $this->getDoctrine()->getManager();
        $myforms = [];
        if($this->isGranted("ROLE_SUPERVISOR")){
            $sessions = $em->getRepository("AppBundle:Session")->findBy(array("sessionmanager" => $this->getUser()));
            foreach ($sessions as $s){
                $mf = $em->getRepository("AppBundle:Formation")->findBy(array("sess" => $s));
                if(count($mf) > 0) array_push($myforms,$mf);
            }
        }
        $formation = $em->getRepository('AppBundle:Formation')->findBy(array('formId' => $score));
        return $this->render('serept/dashboard.html.twig',array('myforms' => $myforms,'score' => $score,'user' => $user,'formation' => $formation));

    }


    /**
     * @Route("/About", name="aboutpage")
     */
    public function aboutAction(Request $request)
    {

        return $this->render('serept/about.html.twig');

    }



}
