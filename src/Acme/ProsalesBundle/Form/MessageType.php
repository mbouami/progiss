<?php

namespace Acme\ProsalesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class MessageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $niv=0;
    private $iddevis=0;   
    private $urlupload=null;    
    
    public function __construct($niveau,$iddevis,$url)
    {
        $this->niv = $niveau;
        $this->iddevis = $iddevis; 
        $this->urlupload = $url;
    }    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
         $builder
            ->add('a', 'text',array('label'=>'A : ',
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_a_$this->niv'",                                                 
                                                        'placeHolder' => 'a',
                                                        'style'=>"width:300px;",
                                                    )) )
//            ->add('cc', 'text',array('label'=>'Cc : ',
//                                        'required'=>false,                
//                                        'attr'=> array(
//                                                        'data-dojo-type' =>'dijit/form/TextBox',
//                                                        'data-dojo-props' =>"id:'message_cc_$this->niv'",                                                 
//                                                        'placeHolder' => 'cc',
//                                                        'style'=>"width:300px;",
//                                                    )) )
            ->add('bcc', 'text',array('label'=>'Cci : ',
                                        'required'=>false,                                          
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_bcc_$this->niv'",                                                 
                                                        'placeHolder' => 'cci',
                                                        'style'=>"width:300px;",
                                                    )) )                
            ->add('objet', 'text',array('label'=>'Objet du message : ',
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_objet_$this->niv'",                                                 
                                                        'placeHolder' => 'nom du dossier',
                                                        'style'=>"width:300px;",
                                                    )) )
            ->add('description', 'textarea',array('label'=>'Message : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/Editor',                                            
//                                                        'data-dojo-props' =>"id:'message_contenu_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}]",                                             
//                                                        'data-dojo-props' =>"id:'message_contenu_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true},'dijit/_editor/plugins/AlwaysShowToolbar']",    
                                                        'data-dojo-props' =>"id:'message_description_$this->niv',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}]",                                                                                                
//                                                        'data-dojo-props' =>"id:'message_contenu_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}],onChange:function(){this.set('value',arguments[0]);console.log('editor2 onChange handler: ' + arguments[0])}",
                                                        'placeHolder' => 'nom du dossier',
                                                        'style'=>"width:300px;",
                                                    )) )   
            ->add('modelecourrier', 'entity',array('label'=>'Liste des Modèles : ',
                                        'mapped'=>false,
//                                        'empty_value' => false,
                                        'empty_value' => 'Choisir un modèle',
//                                        'empty_data'  => null,
                                        'class' => 'AcmeProsalesBundle:Modelescourriers',                
                                         'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'modelcourrier_$this->niv'",                                               
                                                        'placeHolder' => 'Modèle du courrier',
                                                        'style'=>"width:300px;",
                                                        'onChange' =>"Afficher_Modele(this.value,$this->iddevis,$this->niv);"                                           
                                                    )) )  
            ->add('file','file',array('label'=>'Pièces Jointes : ',              
                                        'attr'=> array(
//                                                        'multiple'=>'multiple',
                                                        'onChange' =>"handleFiles(this.files,$this->urlupload);"
                                                    )) )
            ->add('listefile','choice',array('label'=>'',   
                                        'mapped'=>false,                 
                                        'attr'=> array(
//                                                        'multiple'=>'multiple',
                                                        'data-dojo-type' =>'dijit/form/MultiSelect',
                                                        'data-dojo-props' =>"id:'listefiles_$this->niv'", 
                                                        'style'=>"width:300px;height:300px;",
//                                                        'onChange' =>"handleFiles(this.files,$this->urlupload);"
                                                    )) )                 
            ->add('save', 'submit', array('label' => 'Envoyer le message'))                 
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\ProsalesBundle\Entity\Message'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'message';
    }
}
