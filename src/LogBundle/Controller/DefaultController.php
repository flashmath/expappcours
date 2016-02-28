<?php

namespace LogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @Route("test/essai")
     */
    public function Action(Request $request)
    {
        return $this->render("@Log/Default/index.html.twig");

    }

}
