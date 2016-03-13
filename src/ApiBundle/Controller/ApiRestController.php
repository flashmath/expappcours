<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ApiRestController extends Controller
{
    public function getUserNotificationsAction(){
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userID=$user->getId();
        //$userID = 1;

        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository('AppBundle:NotificationUser')->getNotificationsForUser($userID);

        $tasks = $em->getRepository('AppBundle:Task')->getTasksForForUser($userID);

        $messages = $em->getRepository('AppBundle:Message')->getMessageReceivedByUser($userID);

        $response = Array(
            'count_notification' => count($notifications),
            'count_task' => count($tasks),
            'count_message' => count($messages)
        );

        return $response;

    }

    public function postUserImageAction(Request $request){


        $value = serialize($request->request);

        $response = Array(
            'message' => $value
        );



        return $response;
    }
}
