<?php

namespace LogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LogController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @param Request $request
     * @Route("login/prof")
     */
    public function loginProfAction(Request $request)
    {
        return $this->render("@Log/Log/logprof.html.twig");

    }
}
