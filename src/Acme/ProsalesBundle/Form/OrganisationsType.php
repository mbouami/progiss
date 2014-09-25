<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Acme\ProsalesBundle\Entity\Repository\VillesRepository;

class OrganisationsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $niv=0;
    
    public function __construct($niv)
    {
        $this->niv = $niv;
    }       
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('label'=>'Nom : ',
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_nom_$this->niv'",                                            
                                                        'placeHolder' => 'nom',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('adresse','text',array('label'=>'Adresse : ',
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_adresse_$this->niv'",                                            
                                                        'placeHolder' => 'adresse',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('tel','text',array('label'=>'Téléphone : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_tel_$this->niv'",                                            
                                                        'placeHolder' => 'téléphone',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('fax','text',array('label'=>'Fax : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_fax_$this->niv'",                                            
                                                        'placeHolder' => 'fax',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('email','email',array('label'=>'Email : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_email_$this->niv'",                                            
                                                        'placeHolder' => 'email',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('web','text',array('label'=>'Site seb : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'organisation_web_$this->niv'",                                            
                                                        'placeHolder' => 'site web',
                                                        'style'=>"width:200px;"
                                                    )) )
            ->add('description','textarea',array('label'=>'Description : ',                
                                        'required'=>false,
                                        'attr'=> array(
                                                        'placeHolder' => 'description',
                                                        'data-dojo-props' =>"id:'organisation_description_$this->niv'",                                             
                                                        'rows'=>"5",'cols'=>'10'                                           
                                                    )) )
//            ->add('createdAt')
//            ->add('updatedAt')
//            ->add('pays','entity',array('label'=>'Pays : ',
//                                        'required'=>false,
//                                        'mapped' => false,
//                                        'class' => 'AcmeProsalesBundle:Pays',
//                                         'attr'=> array(
//                                                        'data-dojo-id'=> 'listepays',
//                                                        'data-dojo-type' =>'dijit.form.FilteringSelect',
//                                                        'data-dojo-props' =>"id:'organisation_pays_$this->niv',autoComplete: true",                                             
//                                                        'placeHolder' => 'pays',
//                                                        'onChange' =>"Afficher_Villes_Par_Pays(this.value);",
//                                                        'style'=>"width:200px;"                                           
//                                                    )) )   
//            ->add('ville','entity',array('label'=>'Ville : ',
//                                        'required'=>false,                
//                                        'class' => 'AcmeProsalesBundle:Villes',
//                                        'query_builder' => function(VillesRepository $er) {            
////                                                return $this->idorg>0?$er->ListeContactsParOrganisation($this->idorg):$er->ListeContacts(); 
//                                                return $er->ListeVillesParPays(0);            
//                                        },              
//                                         'attr'=> array(
//                                                        'data-dojo-id'=> 'listevilles',
//                                                        'data-dojo-type' =>'dijit.form.FilteringSelect',
//                                                        'data-dojo-props' =>"id:'organisation_ville_$this->niv',autoComplete: true",                                                 
//                                                        'placeHolder' => 'Choisir une ville',
//                                                        'style'=>"width:200px;"
//                                        )) )                
            ->add('ville',null,array('label'=>'Ville : ',
                                        'required'=>false,                
                                         'attr'=> array(
                                                        'data-dojo-id'=> 'listevilles',
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'organisation_ville_$this->niv'",                                             
                                                        'placeHolder' => 'ville',
                                                        'style'=>"width:200px;"                                           
                                                    )) ) 
            ->add('referent',null,array('label'=>'Référent : ',
//                                        'required'=>false,   
                                        'empty_value' => false,
                                         'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'organisation_referent_$this->niv'",                                             
                                                        'placeHolder' => 'référent',
                                                        'style'=>"width:200px;"                                           
                                                    )) ) 
            ->add('statut',null,array('label'=>'Statut : ',
//                                        'required'=>false, 
                                        'empty_value' => false,
                                         'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'organisation_statut_$this->niv'",                                             
                                                        'placeHolder' => 'statut',
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
            'data_class' => 'Acme\ProsalesBundle\Entity\Organisations'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_prosalesbundle_organisations';
    }
}
