<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiRestController extends Controller
{
    public function getUserNotificationsAction(){
        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository('AppBundle:NotificationUser')->getNotificationsForUser(1);

        $response = Array(
            'count' => count($notifications)
        );

        return $response;

    }
}
