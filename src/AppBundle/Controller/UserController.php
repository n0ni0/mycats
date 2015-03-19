<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Entity\Cat;
use AppBundle\Entity\User;
use AppBundle\Form\Frontend\Type\CatType;

class UserController extends Controller
{
  public function newCatAction(Request $request)
  {
    $cat  = new Cat();
    $form = $this->createForm(new CatType(), $cat);
    $form->handleRequest($request);

    if($form->isValid()){
      $user = $this->get('security.context')->getToken()->getUser();
      $cat->setUser($user);
      $cat->uploadPhoto($this->container->getParameter(
        'mycats.folder.images'));
      $cat->setRevised(0);

      $em = $this->getDoctrine()->getManager();
      $em->persist($cat);
      $em->flush();

      $user->flashMessag($request);
      return $this->redirect($this->generateUrl('new'));
    }

    return $this->render('AppBundle:user:newCat.html.twig', array(
      'form' => $form->createView()
    ));
  }
}

