<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\CatRepository;


class ShowController extends Controller
{
  public function listAction()
  {
    $em  = $this->getDoctrine()->getEntityManager();
    $cat = $em->getRepository('AppBundle:Cat')->findAllCats();

    if(!$cat){
      throw $this->createNotFoundException(
        'No se ha encontrado ningúna mascota'
      );
    }

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
      $cat,
      $this->getRequest()->query->get('page', 1), 6);


    return $this->render('AppBundle:show:list.html.twig', compact(
      'pagination'
    ));
  }

}
