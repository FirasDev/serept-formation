<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityRepository;

class ContentType extends AbstractType
{

    private $u;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->u = $options['user'];

        $pagenumbers    =   array(
            'Page 1' =>  '1',
            'Page 2' =>  '2',
            'Page 3' =>  '3',
            'Page 4' =>  '4',
            'Page 5' =>  '5',
            'Page 6' =>  '6',
            'Page 7' =>  '7',
            'Page 8' =>  '8',
            'Page 9' =>  '9',
            'Page 10' =>  '10'
        );
        $builder->add('pageNb', ChoiceType::class, [
            'multiple' => false,
            'expanded' => false, // render check-boxes
            'choices' =>    $pagenumbers
        ])
            ->add('imgT',FileType::class)
            ->add('textT',TextareaType::class)
            ->add('form',EntityType::class,array(
                'class' => 'AppBundle\Entity\Formation',
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('f')
                        ->join('f.sess','s')
                        ->where('s.sessionmanager = :sm')->setParameter('sm',$this->u);
                },
                'choice_label' => 'Name',
                'multiple' => false
            ))
            ->add('Next',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'user' => null,
            'data_class' => 'AppBundle\Entity\Content'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_content';
    }
}
