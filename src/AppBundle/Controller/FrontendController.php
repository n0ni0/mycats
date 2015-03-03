<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
  public function homeAction()
  {
    return $this->render('AppBundle:frontend:home.html.twig');
  }

  public function profileAction()
  {
    $user_id = 1;

    $em = $this->getDoctrine()->getManager();
    $profile = $em->getRepository('AppBundle:User')
                  ->findUserProfile($user_id);

    return $this->render('AppBundle:frontend:profile.html.twig',array(
      'profile' => $profile
    ));
  }
}
