<?php

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class UserManager
{
  private $encoderFactory;

  public function __construct(EncoderFactory $encoderFactory)
  {
    $this->encoderFactory = $encoderFactory;
  }

  public function setUserPassword(UserInterface $user, $plainPassword)
  {
    $hash = $this->encoderFactory->getEncoder($user)->encodePassword($plainPassword,
    $user->getSalt());
    $user->setPassword($hash);
  }

}
