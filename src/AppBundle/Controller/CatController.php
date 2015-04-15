<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use AppBundle\Entity\Cat;
use AppBundle\Entity\User;
use AppBundle\Form\Frontend\Type\CatType;
use AppBundle\myCatsEvents;

class CatController extends Controller
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

      $request->getSession()->getFlashBag()->add(
        'notice',
        $this->get('translator')->trans('flash.catCreated', array(), 'messages'
      ));

      $event      = new GenericEvent();
      $dispatcher = $this->get('event_dispatcher');
      $dispatcher->dispatch(myCatsEvents::NEW_CAT_CREATED, $event);

      return $this->redirect($this->generateUrl('new'));
    }

    return $this->render('AppBundle:cat:newCat.html.twig', array(
      'form' => $form->createView()
    ));
  }
}

