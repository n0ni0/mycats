<?php

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class Users extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

  private $container;

  public function getOrder()
  {
    return 10;
  }

  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  public function load(ObjectManager $manager)
  {
    for($i=1; $i<50; $i++)
    {
      $user = new User();

      $user->setName($this->getName());
      $user->setSurname($this->getSurname());
      $user->setEmail('user'.$i.'@localhost');

      $user->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));

      $clearPassword = 'user'.$i;
      $encoder       = $this->container->get('security.encoder_factory')->getEncoder($user);
      $codedPassword = $encoder->encodePassword($clearPassword, $user->getSalt());
      $user->setPassword($codedPassword);

      $user->setStartDate(new \DateTime('now - '.rand(1, 150).' days'));

      $manager->persist($user);
    }

    $manager->flush();
  }

  private function getName()
  {
    $mens = array(
       'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
       'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
       'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
       'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando',
       'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
     );
    $womens = array(
       'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
       'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
       'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
       'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
       'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
     );

     if (rand() % 2) {
       return $mens[array_rand($mens)];
     } else {
       return $womens[array_rand($womens)];
     }
  }

  private function getSurname()
  {
    $surnames = array(
       'García', 'González', 'Rodríguez', 'Fernández', 'López', 'Martínez',
       'Sánchez', 'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz',
       'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero',
       'Alonso', 'Gutiérrez', 'Navarro', 'Torres', 'Domínguez', 'Vázquez',
       'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina',
       'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortíz', 'Rubio', 'Marín',
       'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido'
    );

    return  $surnames[array_rand($surnames)].' '.$surnames[array_rand($surnames)];
  }

}
