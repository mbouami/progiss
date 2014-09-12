<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DevisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dossier')
            ->add('reference')
            ->add('totalht')
            ->add('tauxtva')
            ->add('totaltva')
            ->add('totalttc')
            ->add('fraisport')
            ->add('observation')
            ->add('raisonclassement')
            ->add('classement')
            ->add('envoimail')
            ->add('priorite')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('parent')
            ->add('modereglement')
            ->add('typedevis')
            ->add('referent')
            ->add('organisation')
            ->add('contact')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProsalesBundle\Entity\Devis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_prosalesbundle_devis';
    }
}
