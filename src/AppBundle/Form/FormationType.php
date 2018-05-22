<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;

class FormationType extends AbstractType
{
    private $u;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->u = $options['user'];
        $builder->add('name',TextType::class)
            ->add('description',TextareaType::class, array(
                'attr' => array('maxlength' => 255)))
            ->add('theme')
            ->add('mainimage',FileType::class)
            ->add('sess',EntityType::class,array(
                'class' => 'AppBundle\Entity\Session',
                'choice_label' => function ($value){
                    return date_format($value->getDateBegin(),'Y-m-d');
                },
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('s')
                        ->where('s.sessionmanager = :sm')
                        ->andWhere('s.dateEnd > :current_date')
                        ->setParameter('current_date',new \DateTime('now'))
                        ->setParameter('sm',$this->u);
                },
                'multiple' => false
            ))
            ->add('givenskills',TextType::class)
            ->add('Next',SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Formation',
            'user' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formation';
    }


}
