<?php

namespace AppBundle\Form\Frontend\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\True;

class UserType extends AbstractType
{
  public function buildform(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', 'text', array(
        'label'              => 'register.name',
        'translation_domain' => 'forms'
      ))
      ->add('surname', 'text', array(
        'label'              => 'register.surname',
        'translation_domain' => 'forms'
      ))
      ->add('email', 'email', array(
        'label'              => 'register.mail',
        'translation_domain' => 'forms'
      ))
      ->add('password', 'repeated', array(
        'options'        => array('translation_domain' => 'forms'),
        'first_options'  => array('label' => 'register.password'),
        'second_options' => array('label' => 'register.confirmPassword'),
        'type'           => 'password',
      ))
      ->add('legal', 'checkbox', array(
        'mapped'             => false,
        'required'           => true,
        'constraints'        => new True(),
        'label'              => 'register.terms',
        'translation_domain' => 'forms'
       ))
       ->add('Register', 'submit', array(
         'label'              => 'register.submit',
         'translation_domain' => 'forms'
       ));
  }

  public function setDefaultsOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class'         => 'AppBundle\Entity\User',
    ));
  }

  public function getName()
  {
    return 'register';
  }
}
