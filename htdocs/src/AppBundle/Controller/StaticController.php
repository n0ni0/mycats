<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticController extends Controller
{
  public function privacyAction()
  {
    $locale = $this->getRequest()->getLocale();

    switch($locale){
      case "es":
        return $this->render('AppBundle:static:privacyEs.html.twig');
        break;
      case "en":
        return $this->render('AppBundle:static:privacyEn.html.twig');
    }
    
  }
}
