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
      ->add('name')
      ->add('surname')
      ->add('email')
      ->add('password', 'repeated', array(
        'first_name'  => 'password',
        'second_name' => 'confirm',
        'type'        => 'password',
      ))
      ->add('Register', 'submit', array(
       'label' => 'Modificar mi perfíl'
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

