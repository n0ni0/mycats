<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Cat;
use AppBundle\Entity\Breed;

class Cats extends AbstractFixture implements OrderedFixtureInterface
{
  public function getOrder()
  {
    return 30;
  }

  public function load(ObjectManager $manager)
  {
    $users  = $manager->getRepository('AppBundle:User')->findAll();
    $breeds = $manager->getRepository('AppBundle:Breed')->findAll();

    for ($i = 0; $i < 10; $i++) {
      $cat = new Cat();

      $user  = $users[array_rand($users)];
      $breed = $breeds[array_rand($breeds)];
      $cat->setUser($user);
      $cat->setName($this->getName());
      $cat->setBreed($breed);
      $cat->setGenre('male');
      $cat->setAge(rand(1,20));
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
