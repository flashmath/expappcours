<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("user")
     */
    public function indexAction()
    {
        $user =$this->getUser();
        $name =$user->getUsername();

        return $this->render('UserBundle:User:index.html.twig',
            array(
                'name'=>$name
            ));

    }
}
