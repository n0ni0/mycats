<?php

namespace AppBundle\EventListener;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use AppBundle\Util\Constants;

class EmailListener
{
  protected $mailer;
  protected $templating;

  public function __construct($mailer, EngineInterface $templating)
  {
    $this->mailer     = $mailer;
    $this->templating = $templating;
  }

  public function onNewCatCreated(GenericEvent $event)
  {
    $cat     = $event->getSubject();
    $infoMail = Constants::INFO_MAIL;
    $message  = \Swift_Message::newInstance()
      ->setSubject('mycats | nuevo gato creado')
      ->setFrom($infoMail)
      ->setTo($infoMail)
      ->setBody($this->templating->render('AppBundle:email:newCatEmail.html.twig',
        array('cat' => $cat)
      ));

    $this->mailer->send($message);
  }

}
