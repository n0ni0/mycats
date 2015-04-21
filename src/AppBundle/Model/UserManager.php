<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Entity\Repository;
use Symfony\Component\Templating\EngineInterface;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;
class UserManager
{
  protected $mailer;
  protected $templating;
  protected $encoderFactory;
  protected $em;

  public function __construct($mailer, EngineInterface $templating,
    EncoderFactoryInterface $encoderFactory, EntityManager $em)
  {
    $this->mailer         = $mailer;
    $this->templating     = $templating;
    $this->encoderFactory = $encoderFactory;
    $this->em             = $em;
  }

  public function sendContact($contactForm)
  {
      $data    = $contactForm->getData();
      $message = $this->mailer->createMessage()
        ->setSubject('Formulario de contacto mycats')
        ->setFrom('info@mycats.esy.es')
        ->setTo(array('info@mycats.esy.es' => 'noreply@gmail.com'))
        ->setBody($this->templating->render('AppBundle:account:contactTemplate.html.twig',
          array('name'    => $data['name'],
                'mail'    => $data['mail'],
                'content' => $data['content']
          )
        ));

      $this->mailer->send($message);
  }

  public function setUserPassword(UserInterface $user, $form)
  {
    $plainTextPassword = $form->get('password')->getData();
    $hash = $this->encoderFactory->getEncoder($user)->encodePassword($plainTextPassword, $user->getSalt());
    $user->setPassword($hash);
  }

  public function saveUser(User $user, $flush = true)
  {
    $this->em->persist($user);
    if($flush){
      $this->em->flush();
    }
  }

}
