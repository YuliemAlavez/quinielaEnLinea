<?php

namespace Quiniela\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PredictionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scorelocalteam','integer')
            ->add('scorevisitingteam','integer')
            ->add('createdat','datetime')
            ->add('updatedat','datetime')
            ->add('predictionat','datetime')
            ->add('game')
            ->add('user')
            ->add('Guardar','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Quiniela\MainBundle\Entity\Prediction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'quiniela_mainbundle_prediction';
    }
}
