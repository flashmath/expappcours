<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig');
    }

    /**
     * @param Request $request
     * @Route("conditions")
     * TODO-ME Page Conditions d'utilisations
     */
    public function conditionsAction(Request $request){

    }

    /**
     * @param Request $request
     * @Route("assistance")
     * TODO-ME Page Assistance
     */
    public function assistanceAction(Request $request){
        return $this->render("@App/default/assistance.html.twig");

    }

    /**
     * @param Request $request
     * @Route("contact")
     */
    public function contactAction(Request $request)
    {
        return $this->render("@App/default/contact.html.twig");

    }

    /**
     * @param Request $request
     * @Route("newsletter")
     */
    public function newsletterAction(Request $request)
    {

    }

    /**
     * @param Request $request
     * @Route("apropos")
     */
    public function aproposAction(Request $request)
    {
        return $this->render("@App/default/apropos.html.twig");

    }

    /**
     * @param Request $request
     * @Route("news")
     */
    public function newsAction(Request $request)
    {

    }

    /**
     * @param Request $request
     * @Route("info/teacher")
     */
    public function infoteacherAction(Request $request)
    {
        return $this->render("@App/default/infoteacher.html.twig");

    }

    /**
     * @param Request $request
     * @Route("info/university")
     */
    public function infouniversityAction(Request $request)
    {
        return $this->render("@App/default/infouniversity.html.twig");

    }

    /**
     * @param Request $request
     * @Route("info/parents")
     */
    public function infoparentsAction(Request $request)
    {
        return $this->render("@App/default/infoparents.html.twig");

    }

}
