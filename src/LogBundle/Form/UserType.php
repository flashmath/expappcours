<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 21/02/2016
 * Time: 22:03
 */

namespace LogBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');
        $builder->add('password',PasswordType::class);
    }

    public function getName(){
        return 'user';
    }
}