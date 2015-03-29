<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticController extends Controller
{
  public function privacyAction()
  {
    return $this->render('AppBundle:static:privacy.html.twig');
  }
}
