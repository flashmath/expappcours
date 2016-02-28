<?php

namespace LogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\User;
use LogBundle\Form\UserType;

class LogController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("test",name="login_test")
     */
    public function indexAction()
    {
        $name='test';
        return $this->render('@Log/default/index.html.twig', array('name' => $name));
    }

    /**
     * @param Request $request
     * @Route("login/prof",name="login_prof")
     */
    public function loginProfAction(Request $request)
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUserName = $authenticationUtils->getLastUsername();


        $user = new User();
        $form = $this->createForm(UserType::class,$user);


        return $this->render("@Log/Log/logprof.html.twig",
            array('form'=>$form->createView(),
                'last_username'=>$lastUserName,
                'error'=>$error));

    }

    /**
     * @Route("/login_check",name="login_check")
     */
    public function loginCheckAction()
    {
        return $this->render('@Log/Log/login.html.twig',
            array('message'=>'Function loginCheck'));
    }

    /**
     * @Route("/admin",name="admin")
     */
    public function adminAction()
    {
        return $this->render('@Log/Log/login.html.twig',
            array('message'=>'Function admin'));
    }

    /**
     * @Route("/admin/suite")
     */
    public function adminSuiteAction()
    {
        return $this->render('@Log/Log/login.html.twig',
            array('message'=>'Function adminSuite'));
    }
}
