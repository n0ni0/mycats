<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Entity\Repository;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use AppBundle\Entity\Cat;
use AppBundle\Entity\User;
use AppBundle\Entity\CatRepository;
use AppBundle\Entity\BreedRepository;
use AppBundle\myCatsEvents;


class CatManager
{
  protected $dispatcher;
  protected $em;
  protected $container;
  protected $repo;

  public function __construct(EntityManager $em, EventDispatcherInterface $dispatcher, Container $container)
  {
    $this->dispatcher = $dispatcher;
    $this->em         = $em;
    $this->container  = $container;
    $this->repo       = $em->getRepository('AppBundle:Cat');
  }

  public function prepareDates(Cat $cat, $user)
  {
    $cat->setUser($user);
    $cat->uploadPhoto($this->container->getParameter(
      'mycats.folder.images'));
    $cat->setRevised(0);
  }

  public function saveCat(Cat $cat, $flush = true)
  {
    $this->em->persist($cat);
    if($flush){
      $this->em->flush();
    }

    $event = new GenericEvent();
    $this->dispatcher->dispatch(myCatsEvents::NEW_CAT_CREATED, $event);
  }

  public function findAllCats()
  {
    return $this->repo->findAllCats();
  }

  public function listBreed($breed)
  {
    return $this->repo->listBreed($breed);
  }

}

