<?php

namespace AppBundle\Form\Frontend\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
  public function buildform(FormBuilderInterface $builder, array $options)
  {
    $builder
    ->add('name', 'text', array(
      'label'              => 'contact.name',
      'translation_domain' => 'forms',
      'required'           => true,
      'max_length'         => 100,
      'attr'               => array(
        'class'            => 'span8',
      )
    ))
    ->add('mail', 'email', array(
      'label'              => 'contact.mail',
      'translation_domain' => 'forms'
    ))
    ->add('content', 'textarea', array(
      'label'              => 'contact.message',
      'translation_domain' => 'forms',
      'required'           => true,
      'max_length'         => 2500,
      'attr'               => array(
        'class'            => 'span8',
        'rows'             => '10'
      )
    ))
    ->add('Register', 'submit', array(
         'label'              => 'contact.submit',
         'translation_domain' => 'forms'
       ));
  }

  public function getName()
  {
    return 'contact';
  }
}
