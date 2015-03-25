<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BreedRepository extends EntityRepository
{
  public function findBreedIfExistOne()
  {
    $revised = 1;

    $em  = $this->getEntityManager();
    $dql = 'SELECT b
              FROM AppBundle:Breed b
              JOIN AppBundle:Cat c
              WHERE b.id = IDENTITY(c.breed)
                AND c.revised = :revised';

    $query = $em->createQuery($dql);
    $query->setParameter('revised', $revised);

    return $query->getResult();
  }

}
