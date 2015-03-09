<?php

namespace AppBundle\Form\Frontend\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
  public function buildform(FormBuilderInterface $builder, array $options)
  {
    $builder->add('name', 'text', array(
      'label'      => 'Nombre',
      'required'   => true,
      'max_length'  => 100,
      'attr'       => array(
        'class'    => 'span8',
      )
    ));

    $builder->add('mail', 'email', array(
      'label'      => 'Email')
    );

    $builder->add('content', 'textarea', array(
      'label'      => 'Mensaje',
      'required'   => true,
      'max_length'  => 2500,
      'attr'       => array(
        'class'    => 'span8',
        'rows'     => '10'
      )
    ));
  }

  public function getName()
  {
    return 'contact';
  }
}
