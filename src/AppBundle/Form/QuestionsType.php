<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class QuestionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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

        $builder->add('question',TextType::class)
            ->add('rep1',TextType::class)
            ->add('rep2',TextType::class)
            ->add('rep3',TextType::class)
            ->add('answer',TextType::class)
            ->add('pagenumber', ChoiceType::class, [
                'multiple' => false,
                'expanded' => false, // render check-boxes
                'choices' =>    $pagenumbers
            ])
            ->add('Next',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Questions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_questions';
    }


}
