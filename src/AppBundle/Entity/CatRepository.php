<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CatRepository extends EntityRepository
{
  public function findAllCats()
  {
    $revised = 1;

    $em = $this->getEntityManager();

    $dql = 'SELECT c
              FROM AppBundle:Cat c
             WHERE c.revised = :revised
          ORDER BY c.id ASC';

    $query = $em->createQuery($dql);
    $query->setParameter('revised', $revised);

    return $query->getResult();
  }
}
