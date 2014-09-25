<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VillesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville')
            ->add('cp')
            ->add('pays','country', array(
				    'empty_value' => 'Choisissez un pays',
            		'required'    => true,
                                         'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'villes_pays'", 
                                                        'style'=>"width:200px;"                                           
                                                    )) ) 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProsalesBundle\Entity\Villes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_prosalesbundle_villes';
    }
}
