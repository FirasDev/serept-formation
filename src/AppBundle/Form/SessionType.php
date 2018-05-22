<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\User;

class SessionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateBegin',DateTimeType::class)
            ->add('dateEnd',DateTimeType::class)
            ->add('sessionmanager',EntityType::class,array(
                'class' => User::class,
                'choice_label' => function($user){
                    return $user->getFirstname()." ".$user->getLastname();
                },
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')->setParameter('role','%ROLE_SUPERVISOR%');
                },
                'multiple' => false
            ))->add('Submit',SubmitType::class,array(
                'label' => 'Save Changes'
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Session'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_session';
    }


}
