<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 3/1/2018
 * Time: 05:09 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class EditFormType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('mobilenumber');
        $builder->remove('username');
    }



    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'FOS\UserBundle\Form\Model\CheckPassword');
    }

    public function getBlockPrefix()
    {
        return 'app_edit_profile';
    }
    public function getName()
    {
        return $this->getBlockPrefix();
    }

}