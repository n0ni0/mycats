<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Form\Frontend\Type\ContactType;
use AppBundle\Form\Frontend\Type\RegisterType;
use AppBundle\Entity\User;

class AccountController extends Controller
{
  public function loginAction()
  {
    $helper = $this->get('security.authentication_utils');

    return $this->render('AppBundle:account:login.html.twig', array(
      'last_username' => $helper->getLastUsername(),
      'error'         => $helper->getLastAuthenticationError(),
    ));
  }


  public function registerAction(Request $request)
  {
    $user = new User();

    $form = $this->createForm(new RegisterType(), $user);
    $form->handleRequest($request);
    if($form->isValid())
    {
      $this->get('userManager')->setUserPassword($user,
      $form->get('password')->getData());

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      return $this->redirect($this->generateUrl('contact'));
    }

    return $this->render(
      'AppBundle:account:register.html.twig', array(
        'form' => $form->createView()
      ));
  }


  public function contactAction(Request $request)
  {
    $form = $this->createForm(new ContactType());

    return $this->render('AppBundle:account:contact.html.twig', array(
        'form' => $form->createView()
    ));
  }
}
