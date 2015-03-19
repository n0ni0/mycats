<?php

namespace AppBundle\Form\Frontend\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CatType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name')
      ->add('genre', 'choice', array(
        'choices' => array(
          'male'   => 'Macho',
          'female' => 'Hembra'
      )))
      ->add('breed', 'entity', array(
        'class'    => 'AppBundle:Breed',
        'property' => 'name',
      ))
      ->add('age')
      ->add('comments')
      ->add('formPhoto', 'file',array(
        'required' => false
      ))
      ->add('create', 'submit', array(
        'label' => 'Crear'));
  }

  public function setDefaultsOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Cat'
    ));
  }

  public function getName()
  {
    return 'newCat';
  }

}
