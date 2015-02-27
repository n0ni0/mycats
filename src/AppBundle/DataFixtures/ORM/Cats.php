<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Cat;

class Cats implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $users = $manager->getRepository('AppBundle:User')->findAll();

    for ($i = 0; $i < 10; $i++) {
      $cat = new Cat();

       $user =  $users[array_rand($users)];
      $cat->setUser($user);
      $cat->setName($this->getName());
      $cat->setBreed($this->getBreed());
      $cat->setGenre('male');
      $cat->setAge($i);
      $cat->setPhoto('photo'.rand(1,20).'jpg');
      $cat->setComments($this->getComments());
      $cat->setRevised(true);

      $manager->persist($cat);
    }
      $manager->flush();
  }

    private function getName()
    {
      $males = array(
        'Oli', 'Zapi', 'Pelu', 'Coco', 'Felix', 'Gardfield', 'Michifu');

      return $males[array_rand($males)];
    }

    private function getBreed()
    {
     $breeds = array(
      'Persa', 'Siamés', 'Abisinio', 'Azul Ruso', 'British Shorthair',
      'Ragdoll', 'Bengala', 'Ragamuffin'
      );

     return $breeds[array_rand($breeds)];
    }

    private function getComments()
    {
      $comments = array(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit,  eiusmod tempor incididunt ut labore et
        dolore magna aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
        nisi ut aliquip ex ea commodo consequat',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit,  eiusmod tempor incididunt ut 
        labore et dolore magna aliqu Ut enim ad minim veniam, quis nostrud exercitation u commodo consequat'
      );

      return $comments[array_rand($comments)];
    }

}
