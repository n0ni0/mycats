<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Breed;

class Breeds extends AbstractFixture implements OrderedFixtureInterface
{
  public function getOrder()
  {
    return 20;
  }

  public function load(ObjectManager $manager)
  {
    $breeds = array(
      'siames',
      'persa',
      'angora',
    );

    foreach ($breeds as $name)
    {
      $breed = new Breed();
      $breed->setName($name);

      $manager->persist($breed);
    }

    $manager->flush();
  }
}
