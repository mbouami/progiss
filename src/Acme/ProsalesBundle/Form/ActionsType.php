<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActionsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sujet')
            ->add('a')
            ->add('cc')
            ->add('cci')
            ->add('pj')
            ->add('description')
//            ->add('createdAt')
//            ->add('updatedAt')
            ->add('typeaction')
            ->add('referent')
            ->add('organisation')
            ->add('contact')
            ->add('piecejointe')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProsalesBundle\Entity\Actions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_prosalesbundle_actions';
    }
}
