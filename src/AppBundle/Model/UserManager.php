<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Entity\Repository;
use Symfony\Component\Templating\EngineInterface;
use AppBundle\Entity\User;

class UserManager
{
  protected $mailer;
  protected $templating;

  public function __construct($mailer, EngineInterface $templating)
  {
    $this->mailer     = $mailer;
    $this->templating = $templating;
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
}
