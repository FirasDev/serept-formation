<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 2/27/2018
 * Time: 11:10 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = array(
            'Supervisor'  => 'ROLE_SUPERVISOR',
            'Admin'       => 'ROLE_ADMIN'
        );

        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('mobilenumber');
        $builder->add('roles', ChoiceType::class, [
            'multiple' => true,
            'expanded' => true, // render check-boxes
            'choices' =>$permissions
        ])
            // other fields...
        ;
        $builder->remove('username');

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
        #return GroupFormType::class;
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function Name()
    {
        return $this->getBlockPrefix();
    }

}