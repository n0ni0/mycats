<?php

namespace AppBundle\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Entity\Repository;
use AppBundle\Entity\Cat;
use AppBundle\Entity\User;
use AppBundle\Entity\CatRepository;
use AppBundle\Entity\BreedRepository;

class BreedManager
{
  protected $em;
  protected $repo;

  public function __construct(EntityManager $em)
  {
    $this->em         = $em;
    $this->repo       = $em->getRepository('AppBundle:Breed');
  }

  public function findBreedIfExistOne()
  {
    return $this->repo->findBreedIfExistOne();
  }
}
