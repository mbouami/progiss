<?php
namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Acme\ProsalesBundle\Entity\Tauxtva;
use Acme\ProsalesBundle\Entity\Services;

/**
 * Description of ParametresController
 *
 * @author Mohammed
 */
class ParametresController extends Controller {
    
	public function listetauxtvaAction()
	{
            $em = $this->getDoctrine()->getManager();
            $listetauxtva = array();
//            $sortie = array("erreur"=>true,
//                            "action" => "liste",
//                            "type"=>"tauxtva",              
//                            "message"=>"Liste des taux de tva");             
            $tauxtva = $em->getRepository('AcmeProsalesBundle:Tauxtva')->findAll();
            if (!$tauxtva) {
                throw $this->createNotFoundException('Impossible de trouver des Taux de TVA.');
            }            
            foreach ($tauxtva as $key => $tva) {
                $listetauxtva[] = array('id' => $tva->getId(),'taux' => $tva->getTaux());
            }
//            $sortie["erreur"] = false;         
//            $sortie["resultat"] = $listetauxtva;     
            $response = new JsonResponse();
            $response->setData($listetauxtva);
            return $response;       
//            return $this->render('AcmeProsalesBundle:Parametres:tauxtva.html.twig', array(
//                'sortie' => $response->getContent(),
//            ));            
            
        }
        
	public function listeservicesAction()
	{
            $em = $this->getDoctrine()->getManager();
            $listeservices = array();
//            $sortie = array("erreur"=>true,
//                            "action" => "liste",
//                            "type"=>"services",              
//                            "message"=>"Liste des services");             
            $services = $em->getRepository('AcmeProsalesBundle:Services')->findAll();
            if (!$services) {
                throw $this->createNotFoundException('Impossible de trouver des services.');
            }            
            foreach ($services as $key => $service) {
                $listeservices[] = array(
                                        'id' => $service->getId(),
                                        'service' => $service->getNom()
                    
                );
            }
//            $sortie["erreur"] = false;         
//            $sortie["resultat"] = $listeservices;     
            $response = new JsonResponse();
            $response->setData($listeservices);
            return $response;                  
        }   
        
        public function AfficherTauxAction()
        {
            $taux = new Tauxtva();
            $form = $this->createFormBuilder($taux)
                ->add('listetauxtva',null,array(
                                            'mapped' => false,
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'grilletauxtva',                                                
                                                            'data-dojo-type' =>'GrilleTauxtva',
                                                            'data-dojo-props'=> "id:'grilletauxtva',store:StoreTauxTva",
                                                            'onClick' =>"deletetauxtva.set('disabled', false);"
                                                        )) ) 
                ->add('nouveautaux', 'text',array('label'=>'saisir un taux : ',
                                            'mapped' => false,                    
                                            'required'=>false,                    
                                            'attr'=> array(
                                                            'data-dojo-id'=> 'nouveauxtauxtva',                                                 
                                                            'data-dojo-type' =>'dijit/form/TextBox',
                                                            'data-dojo-props' =>"id:'nouveauxtauxtva'",                                                 
//                                                            'placeHolder' => 'saiir un taux',
                                                            'style'=>"width:50px;",
                                                            'onFocus' =>"savetauxtva.setDisabled(false);" 
                                                        )) )                    
                ->add('delete', 'button',array('label'=>'Supprimer',
    //                                        'mapped' => false,
                                             'disabled'=>true,                    
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'deletetauxtva',                                                
                                                            'data-dojo-type' =>'dijit/form/Button',
                                                            'data-dojo-props'=> "id:'deletetauxtva'",
//                                                            'onClick' =>"SupprimerTauxTva(grilletauxtva);"
                                                            'onClick' =>"Execute_href('post',grilletauxtva.select.row.getSelected()[0]+'/deletetaux',grilletauxtva);"                                                 
                                                        )) )                 
                ->add('save', 'button',array('label'=>'Sauvegarder',
    //                                        'mapped' => false,
                                             'disabled'=>true,
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'savetauxtva',                                                
                                                            'data-dojo-type' =>'dijit/form/Button',
                                                            'data-dojo-props'=> "id:'savetauxtva'",
                                                            'onClick' =>"Execute_href('post',nouveauxtauxtva.value+'/savetaux',grilletauxtva);"                                                 
                                                        )) )                 
    //            ->add('save', 'submit',array('label'=>'Sauvegarder'))
                ->getForm();        
            return $this->render('AcmeProsalesBundle:Parametres:tauxtva.html.twig', array(
                'form' => $form->createView(),
            ));
        } 

    public function savetauxAction($tauxtva)
    {
        $sortie = array("erreur"=>true,
                        "action" => "new",
                        "type"=>"tauxtva",
                        "typezone" => "onglet",            
                        "message"=>"Le taux n'a pas été enregistré");
        $em = $this->getDoctrine()->getManager();
        $taux = new Tauxtva();
        $taux->setTaux($tauxtva);        
        $em->persist($taux);
        $em->flush();                
        $sortie["erreur"] = false;             
        $sortie["message"] = "Le taux a été enregistré";   
        $sortie["resultat"] = array('id' => $taux->getId(),'taux' => $tauxtva);        
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
    }        
        
    public function deletetauxAction(Request $request, $id)
    {
        $sortie = array("erreur"=>true,
                        "action" => "delete",
                        "type"=>"tauxtva",
                        "typezone" => "onglet",            
                        "message"=>"Le taux n'a pas été supprimé"); 
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AcmeProsalesBundle:Tauxtva')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }
        $em->remove($entity);
        $em->flush();
        $sortie["erreur"] = false;
        $sortie["id"] = $id;               
        $sortie["message"] = "Le taux a été supprimé";              
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
//        return $this->redirect($this->generateUrl('devis'));
    }   
    
        public function AfficherServicesAction()
        {
            $service = new Services();
            $form = $this->createFormBuilder($service)
                ->add('listeservices',null,array(
                                            'mapped' => false,
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'grilleservices',                                                
                                                            'data-dojo-type' =>'GrilleServices',
                                                            'data-dojo-props'=> "id:'grilleservices',store:StoreServices",
                                                            'onClick' =>"deleteservice.set('disabled', false);"
                                                        )) ) 
                ->add('nouveauservice', 'text',array('label'=>'saisir un serice : ',
                                            'mapped' => false,                    
                                            'required'=>false,                    
                                            'attr'=> array(
                                                            'data-dojo-id'=> 'nouveauservice',                                                 
                                                            'data-dojo-type' =>'dijit/form/TextBox',
                                                            'data-dojo-props' =>"id:'nouveauservice'",                                                 
//                                                            'placeHolder' => 'saiir un taux',
                                                            'style'=>"width:200px;",
                                                            'onFocus' =>"saveservice.setDisabled(false);" 
                                                        )) )                    
                ->add('delete', 'button',array('label'=>'Supprimer',
    //                                        'mapped' => false,
                                             'disabled'=>true,                    
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'deleteservice',                                                
                                                            'data-dojo-type' =>'dijit/form/Button',
                                                            'data-dojo-props'=> "id:'deleteservice'",
//                                                            'onClick' =>"SupprimerTauxTva(grilletauxtva);"
                                                            'onClick' =>"Execute_href('post',grilleservices.select.row.getSelected()[0]+'/deleteservice',grilleservices);"                                                 
                                                        )) )                 
                ->add('save', 'button',array('label'=>'Sauvegarder',
    //                                        'mapped' => false,
                                             'disabled'=>true,
                                             'attr'=> array(
                                                            'data-dojo-id'=> 'saveservice',                                                
                                                            'data-dojo-type' =>'dijit/form/Button',
                                                            'data-dojo-props'=> "id:'saveservice'",
                                                            'onClick' =>"Execute_href('post',nouveauservice.value+'/saveservice',grilleservices);"                                                 
                                                        )) )                 
    //            ->add('save', 'submit',array('label'=>'Sauvegarder'))
                ->getForm();        
            return $this->render('AcmeProsalesBundle:Parametres:services.html.twig', array( 
                'form' => $form->createView(),
            ));
        } 
 
    public function saveserviceAction($nomservice)
    {
        $sortie = array("erreur"=>true,
                        "action" => "new",
                        "type"=>"service",
                        "typezone" => "onglet",            
                        "message"=>"Le service n'a pas été enregistré");
        $em = $this->getDoctrine()->getManager();
        $service = new Services();
        $service->setNom($nomservice);        
        $em->persist($service);
        $em->flush();                
        $sortie["erreur"] = false;             
        $sortie["message"] = "Le service a été enregistré";   
        $sortie["resultat"] = array('id' => $service->getId(),'service' => $nomservice);        
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
    }        
        
    public function deleteserviceAction(Request $request, $id)
    {
        $sortie = array("erreur"=>true,
                        "action" => "delete",
                        "type"=>"service",
                        "typezone" => "onglet",            
                        "message"=>"Le service n'a pas été supprimé"); 
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AcmeProsalesBundle:Services')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }
        $em->remove($entity);
        $em->flush();
        $sortie["erreur"] = false;
        $sortie["id"] = $id;               
        $sortie["message"] = "Le service a été supprimé";              
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
//        return $this->redirect($this->generateUrl('devis'));
    }           
}
