<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function infoAction()
    {
        return $this->render('AppBundle:default/statics:info.html.twig');
    }
}
