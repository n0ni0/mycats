<?php

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class EmailListener
{
  protected $mailer;

  public function __construct($mailer)
  {
    $this->mailer = $mailer;
  }

  public function onNewCatCreated()
  {
    $message = \Swift_Message::newInstance()
      ->setSubject('mycats')
      ->setFrom('info@mycats.esy.es')
      ->setTo('info@mycats.esy.es')
      ->setBody('Se ha creado un nuevo gato, revísalo');

    $this->mailer->send($message);
  }

}
