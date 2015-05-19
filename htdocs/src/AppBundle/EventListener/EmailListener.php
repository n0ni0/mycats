<?php

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;
use AppBundle\Util\Constants;

class EmailListener
{
  protected $mailer;

  public function __construct($mailer)
  {
    $this->mailer = $mailer;
  }

  public function onNewCatCreated()
  {
    $infoMail = Constants::INFO_MAIL;
    $message = \Swift_Message::newInstance()
      ->setSubject('mycats | nuevo gato creado')
      ->setFrom($infoMail)
      ->setTo($infoMail)
      ->setBody('Se ha creado un nuevo gato, revísalo');

    $this->mailer->send($message);
  }

}
