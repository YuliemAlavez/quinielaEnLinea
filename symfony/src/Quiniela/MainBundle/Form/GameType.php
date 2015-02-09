<?php

namespace Quiniela\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GameType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('season') 
            ->add('localteam')
            ->add('scorelocalteam','integer')
            ->add('visitingteam')
            ->add('scorevisitingteam','integer')
            ->add('gameat','datetime')
            ->add('createdat','datetime')
            ->add('updatedat','datetime')
            ->add('Guardar','submit')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Quiniela\MainBundle\Entity\Game'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'quiniela_mainbundle_game';
    }
}
