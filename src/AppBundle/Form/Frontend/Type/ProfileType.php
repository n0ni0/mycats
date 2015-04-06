<?php

namespace AppBundle\Form\Frontend\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\True;

class ProfileType extends AbstractType
{
  public function buildform(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', 'text', array(
        'label'              => 'profile.name',
        'translation_domain' => 'forms'
      ))
      ->add('surname', 'text', array(
        'label'              => 'profile.surname',
        'translation_domain' => 'forms'
      ))
      ->add('email', 'email', array(
        'label'              => 'profile.email',
        'translation_domain' => 'forms'
      ))
      ->add('password', 'repeated', array(
        'options'     =>  array('translation_domain' => 'forms'),
        'first_options'  => array('label' => 'profile.password'),
        'second_options' => array('label' => 'profile.confirmPassword'),
        'type'        => 'password',
      ))
      ->add('Register', 'submit', array(
        'label'              => 'profile.submit',
        'translation_domain' => 'forms'
       ));
  }

  public function setDefaultsOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\User'
    ));
  }

  public function getName()
  {
    return 'editProfile';
  }
}

