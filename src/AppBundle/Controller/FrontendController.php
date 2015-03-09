<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Form\Frontend\Type\ContactType;
use AppBundle\Form\Frontend\Type\RegisterType;
use AppBundle\Entity\User;

class FrontendController extends Controller
{
  public function loginAction()
  {
    $helper = $this->get('security.authentication_utils');

    return $this->render('AppBundle:frontend:login.html.twig', array(
      'last_username' => $helper->getLastUsername(),
      'error'         => $helper->getLastAuthenticationError(),
    ));
  }


  public function registerAction(Request $request)
  {
    $user = new User();
    $user->setStartDate(new \DateTime('today'));

    $form = $this->createForm(new RegisterType(), $user);
    $form->handleRequest($request);
    if($form->isValid())
    {
      $encoder = $this->get('security.encoder_factory')
                      ->getEncoder($user);
      $user->setSalt(md5('time'));
      $encryptedPassword = $encoder->encodePassword(
        $user->getPassword(),
        $user->getSalt()
        );
        $user->setPassword($encryptedPassword);

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      return $this->redirect($this->generateUrl('contact'));
    }

    return $this->render(
      'AppBundle:frontend:register.html.twig', array(
        'form' => $form->createView()
      ));
  }


  public function contactAction(Request $request)
  {
    $form = $this->createForm(new ContactType());

    return $this->render('AppBundle:frontend:contact.html.twig', array(
        'form' => $form->createView()
    ));
  }
}
