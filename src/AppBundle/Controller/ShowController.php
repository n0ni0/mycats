<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use AppBundle\Entity\CatRepository;
use AppBundle\Entity\BreedRepository;

class ShowController extends Controller
{
  public function listAction()
  {
    $cat = $this->get('CatManager')->findAllCats();
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

  public function listBreedAction($breed)
  {
    $cat = $this->get('CatManager')->listBreed($breed);
    if(!$cat){
      throw $this->createNotFoundException(
        'No hay ninguna mascota de esa raza'
      );
    }

    $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
      $cat,
      $this->getRequest()->query->get('page', 1), 6);

    return $this->render('AppBundle:show:list.html.twig', array(
      'pagination' => $pagination
    ));
  }

  public function changeBreedAction($breed)
  {
    return new RedirectResponse($this->generateUrl('list',array(
      'breed' => $breed
    )));
  }

  public function selectBreedsAction()
  {
    $breeds = $this->get('BreedManager')->findBreedIfExistOne();
    return $this->render('AppBundle:show:selectBreeds.html.twig', array(
      'breeds' => $breeds
    ));
  }

}
