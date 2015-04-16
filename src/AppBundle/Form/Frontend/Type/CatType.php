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
      ->add('name', 'text', array(
        'label'              => 'cat.name',
        'translation_domain' => 'forms'
      ))
      ->add('genre', 'choice', array(
        'label'              => 'cat.genre',
        'translation_domain' => 'forms',
        'choices'            => array(
          'male'             => 'cat.male',
          'female'           => 'cat.female'
      )))
      ->add('breed', 'entity', array(
        'label'              => 'cat.breed',
        'translation_domain' => 'forms',
        'class'              => 'AppBundle:Breed',
        'property'           => 'name',
      ))
      ->add('age', 'text', array(
        'label'              => 'cat.age',
        'translation_domain' => 'forms'
      ))
      ->add('comments', 'textarea', array(
        'label'              => 'cat.comment',
        'translation_domain' => 'forms'
      ))
      ->add('formPhoto', 'file',array(
        'label'              => 'cat.photo',
        'translation_domain' => 'forms',
        'required'           => true
      ))
      ->add('create', 'submit', array(
        'label'              => 'cat.submit',
        'translation_domain' => 'forms'
      ));
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
