<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommandesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numcommande')
            ->add('dossier')
            ->add('referenceclient')
            ->add('totalht')
            ->add('tauxtva')
            ->add('totaltva')
            ->add('totalttc')
            ->add('fraisport')
            ->add('observation')
            ->add('livrermemeadresse')
            ->add('facturermemeadresse')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('modereglement')
            ->add('livraison')
            ->add('facturation')
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
            'data_class' => 'Acme\ProsalesBundle\Entity\Commandes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_prosalesbundle_commandes';
    }
}
