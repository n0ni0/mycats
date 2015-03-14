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

    if($form->isValid()){
      $this->get('userManager')->setUserPassword($user,
      $form->get('password')->getData());

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      $user->flashMessag($request);

      return $this->redirect($this->generateUrl('contact'));
    }

    return $this->render(
      'AppBundle:account:register.html.twig', array(
        'form' => $form->createView()
      ));
  }


  public function contactAction(Request $request)
  {
    $user = new User();
    $contactForm = $this->createForm(new ContactType());
    $contactForm->handleRequest($request);

    if($contactForm->isValid())
    {
      $data    = $contactForm->getData();
      $mailer  = $this->get('mailer');
      $message = $mailer->createMessage()
        ->setSubject('Formulario de contacto mycats')
        ->setFrom('info@mycats.esy.es')
        ->setTo(array('info@mycats.esy.es' => 'noreply@gmail.com'))
        ->setBody($this->renderView('AppBundle:account:contactTemplate.html.twig',
          array('name'    => $data['name'],
                'mail'    => $data['mail'],
                'content' => $data['content']
          )
        ));
      $user->flashMessag($request);
      $mailer->send($message);
      return $this->redirect($this->generateUrl('contact'));
    }

    return $this->render('AppBundle:account:contact.html.twig', array(
        'form' => $contactForm->createView()
    ));
  }
}
