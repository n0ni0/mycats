<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Entity\Cat;
use AppBundle\Entity\User;
use AppBundle\Form\Frontend\Type\CatType;

class CatController extends Controller
{
  public function newCatAction(Request $request)
  {
    $cat  = new Cat();
    $form = $this->createForm(new CatType(), $cat);
    $form->handleRequest($request);

    if($form->isValid()){
      $user = $this->get('security.context')->getToken()->getUser();
      $this->get('CatManager')->prepareDates($cat, $user);
      $this->get('CatManager')->saveCat($cat);

      $request->getSession()->getFlashBag()->add(
        'notice',
        $this->get('translator')->trans('flash.catCreated', array(), 'messages'
      ));

      return $this->redirect($this->generateUrl('new'));
    }

    return $this->render('AppBundle:cat:newCat.html.twig', array(
      'form' => $form->createView()
    ));
  }
}

