<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LignesdevisType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ordre')
            ->add('reference')
            ->add('prixht')
            ->add('quantite')
            ->add('remise')
            ->add('totalht')
            ->add('description')
//            ->add('devis')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProsalesBundle\Entity\Lignesdevis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lignesdevis';
    }
}
