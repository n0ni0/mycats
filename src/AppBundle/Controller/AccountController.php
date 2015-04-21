<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Form\Frontend\Type\ContactType;
use AppBundle\Form\Frontend\Type\UserType;
use AppBundle\Form\Frontend\Type\ProfileType;
use AppBundle\Entity\User;
use Symfony\Component\Form\FormError;

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
    $form = $this->createForm(new UserType(), $user);
    $form->handleRequest($request);

    if($form->isValid()){
      $email = $form['email']->getData();
      $em = $this->getDoctrine()->getManager();
      $repo = $em->getRepository('AppBundle:User')->findOneByEmail($email);

      if($repo !== null){
          $form['email']->addError(new FormError('Email en uso'));
      }

      else{
      $this->get('UserManager')->setUserPassword($user, $form);
      $this->get('UserManager')->saveUser($user);

      $request->getSession()->getFlashBag()->add(
        'notice',
        $this->get('translator')->trans('flash.register', array(), 'messages'
      ));

      return $this->redirect($this->generateUrl('user_login'));
      }
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
      $this->get('UserManager')->sendContact($contactForm);

      $request->getSession()->getFlashBag()->add(
        'notice',
        $this->get('translator')->trans('flash.contact', array(), 'messages'
      ));

      return $this->redirect($this->generateUrl('contact'));
    }

    return $this->render('AppBundle:account:contact.html.twig', array(
        'form' => $contactForm->createView()
    ));
  }

  public function editProfileAction(Request $request)
  {
    $user = new User();
    $user = $this->get('security.context')->getToken()->getUser();
    $form = $this->createForm(new ProfileType(), $user);
    $originalPassword = $form->getData()->getPassword();
    $form->handleRequest($request);

    if($form->isValid()){
      if(null == $user->getPassword()){
        $user->setPassword($originalPassword);
      }
      else{
      $this->get('userManager')->setUserPassword($user,
      $form->get('password')->getData());
      }

      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();

      $request->getSession()->getFlashBag()->add(
        'notice',
        $this->get('translator')->trans('flash.editProfile', array(), 'messages'
      ));
      return $this->redirect($this->generateUrl('list'));
    }

    return $this->render(
      'AppBundle:account:editProfile.html.twig', array(
        'form' => $form->createView()
      ));

  }

}
