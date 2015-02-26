<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
  public function staticAction($page)
  {
    return $this->render('AppBundle:site:'.$page.'.html.twig');
  }
}
