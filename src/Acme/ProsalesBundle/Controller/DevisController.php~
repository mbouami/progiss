<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Acme\ProsalesBundle\Entity\Devis;
use Acme\ProsalesBundle\Form\DevisType;

use Acme\ProsalesBundle\Entity\Lignesdevis;
use Acme\ProsalesBundle\Entity\Message;
use Acme\ProsalesBundle\Form\MessageType;

use Acme\ProsalesBundle\Entity\Actions;
use Acme\ProsalesBundle\Entity\Document;
use Acme\ProsalesBundle\Form\DocumentType;

use Acme\ProsalesBundle\Entity\Piecesjointes;

use Knp\Snappy\Pdf;

/**
 * Devis controller.
 *
 */
class DevisController extends Controller
{ 
    /**
     * Lists all Devis entities.
     *
     */
    public function listeproduitsAction()
    {
        $listeproduits = array();
        $em = $this->getDoctrine()->getManager();        
        $produits = $em->getRepository('AcmeProsalesBundle:Produits')->findAll();
        foreach ($produits as $key => $produit) {
            $listeproduits[] = array(
                                    'id'=>$produit->getId(),   
                                    'reference'=>$produit->getReference(),                
                                    'libelle'=>$produit->getLibelle(),
                                    'prixht'=>$produit->getPrixht(),                
                                    'cat'=>'produit'
                            );            
        } 
        $response = new JsonResponse();
        $response->setData($listeproduits);
        return $response;        
    }  
    
    
    public function listedevisencoursAction()
    {  
        $listedevis = array();
        $request = $this->getRequest();
        $id = $request->get("id");          
        $sortie = array("erreur"=>false,
                        "action" => "afficher",
                        "type"=>"devis",
                        "typezone" => "onglet",                
                        "message"=>"Liste des devis en cours");   
        $em = $this->getDoctrine()->getManager();        
        $listedevis = $em->getRepository('AcmeProsalesBundle:Devis')->ListeDerniersDevis($id); 
        $sortie["resultat"] = $listedevis;
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;        
    }   
    
    public function detaildevisAction()
    {
        $request = $this->getRequest();
        $id = $request->get("id");  
        $detaildevis = array();
        $em = $this->getDoctrine()->getManager();
        $sortie = array("erreur"=>true,
                        "action" => "detail",
                        "type"=>"devis",              
                        "message"=>"Détail du devis"); 
        if ($id!=null) {
            $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($id); 
            $detaildevis = array(
                                    'id'=>$devis->getId(),
                                    'reference'=>$devis->getReference(),
                                    'dossier'=>$devis->getDossier(),
                                    'createdAt' =>  date_format($devis->getCreatedAt(), "d-m-Y"),
                                    'organisation' => $devis->getOrganisation()->__toString(),            
                                    'contact'=>$devis->getContact()?$devis->getContact()->__toString():null,
                                    'referent'=>$devis->getReferent()->__toString(),  
                                    'signatureweb'=>$devis->getReferent()->getSignatureWeb()?utf8_encode(stream_get_contents($devis->getReferent()->getSignatureWeb())):null,                     
//                                        'totalht' => $devis->getTotalht(), 
//                                        'totaltva' => $devis->getTotaltva(),    
//                                        'tauxtva' => $devis->getTauxtva(),             
//                                        'fraisport' => $devis->getFraisport(),             
//                                        'totalttc' => $devis->getTotalttc(), 
                                    'iddevisparent' => $devis->getParent()!=null?$devis->getParent()->getId():null, 
                                    'devisparent'=> $devis->getParent()==null?null:$devis->getParent()->getReference()                            
                                );
            $sortie["erreur"] = false;         
            $sortie["resultat"] = $detaildevis;                  
        } 
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;             
    } 
        
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Devis')->findAll();

        return $this->render('AcmeProsalesBundle:Devis:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Devis entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Devis();
        $niveau = $request->get("niveau");  
        $sortie = array("erreur"=>true,
                        "action" => "new",
                        "type"=>"devis",
                        "typezone" => "onglet",                
                        "message"=>"Le Devis n'a pas été enregistré");        
        $form = $this->createCreateForm($entity,$niveau);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $parent = $form->get('parent')->getData();
//            echo "parent";            
//            echo $parent;
//            if ($parent>0) {
//                $devisparent = $em->getRepository('AcmeProsalesBundle:Devis')->find($parent); 
//                $entity->setParent($devisparent);
//            }
            $em->persist($entity);
            $em->flush();
            $entity->setReference($entity->getId().$entity->getReferent()->getRefDevis());               
            $em->flush();           
            $sortie["erreur"] = false;
            $sortie["message"] = "Le Devis a été enregistré avec succès";  
            $sortie["idorg"] = $entity->getOrganisation()->getId();   
            $sortie["iddevis"] = $entity->getId();             
            $sortie["idonglet"] = "new_devis_".$entity->getOrganisation()->getId(); 
            $sortie["resultat"] = $entity->getArrayDevis();
//            return $this->redirect($this->generateUrl('devis_show', array('id' => $entity->getId())));
        }
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
    }

    public function enregistrerlignesdevisAction()
    {
        $sortie = array("erreur"=>true,
                        "action" => "new",
                        "type"=>"devis",
                        "typezone" => "onglet",                
                        "message"=>"Le Lignes du Devis n'ont pas été enregistrées");         
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
//        $normalizers->setIgnoredAttributes(array('id'));        
        $serializer = new Serializer($normalizers, $encoders);        
        $request = $this->getRequest();        
        $iddevis = $request->get("iddevis");  
        $lignesdevis = $request->get("lignesdevis");   
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($iddevis);        
        if($lignesdevis) {
            foreach (json_decode($lignesdevis) as $lignedevis) {
                $Lignedevis = new Lignesdevis();                  
                $Lignedevis = $serializer->deserialize(json_encode($lignedevis),'Acme\prosalesBundle\Entity\Lignesdevis','json');                 
                $Lignedevis->setDevis($devis);
                $em->persist($Lignedevis);
                $em->flush();
            }    
            $sortie["erreur"] = false;
            $sortie["message"] = "Les Lignes du Devis ont été enregistrées avec succès";  
            $sortie["idorg"] = $devis->getOrganisation()->getId();   
            $sortie["iddevis"] = $iddevis;             
            $sortie["idonglet"] = "new_devis_".$devis->getOrganisation()->getId(); 
            $sortie["resultat"] = $devis->getArrayDevis();            
        }      
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;           
    }    
    
    protected function getWebDir()
    {
        return __DIR__.'/../../../../web/';
    }       
    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }    
    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
//        return __DIR__.'/../../../../web/'.$this->getUploadDir();
        return $this->getWebDir().$this->getUploadDir(); 
    }    
    
    private function creerdevispdf($id)
    {
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);   
        $parametrepaiement = $em->getRepository('AcmeProsalesBundle:Parametres')->findOneBy(array('nom'=>'paiement'));
        $nomfichier = "Devis_".$devis->getReference().'.pdf';
//        $nomfichier = "Devis".$id.'.pdf';        
        $outputfile = $this->getUploadRootDir().'/'.$nomfichier;
        if (!$devis) {
            throw $this->createNotFoundException('Impossible de trouver le devis recherché.');
        } 
        $html = $this->renderView('AcmeProsalesBundle:Devis:imprimer.html.twig', array(
                            'entity'      => $devis,
                            'paiement'    => $parametrepaiement,
        ));
        if (file_exists($outputfile)) unlink ($outputfile);
//        $this->get('knp_snappy.pdf')->generateFromHtml($html,$outputfile); 
//        return $outputfile;
        $snappy = new Pdf($this->getWebDir() . '../vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');   
//        $snappy->setOption('disable-javascript', true);
        $snappy->setOption('outline', true);
        $snappy->setOption('background', true);        
//        $snappy->setOption('margin-top', '15mm');  
//        $snappy->setOption('margin-bottom', '15mm');         
//        $snappy->setOption('header-center', 'ceci et l\'entête');
        $snappy->setOption('header-right', '[page]/[toPage]');
        $snappy->setOption('header-left', '[date]');
        $snappy->setOption('header-line', true);
        //$snappy->setOption('header-font-size', '18');
        $snappy->setOption('footer-center', '20 Allée des Erables Bat D- Bp64162 - 95978 Roissy CDG Cedex  FRANCE<br>Info@progiss.com - www.progiss.com - Tel 01 49 89 07 90 - Fax 01 49 89 07 91<br>SAS au capital de 43750 Euros  - Siret :49901977600024 R.C.S Bobigny N° TVA : FR43499019776');
//        $snappy->setOption('footer-right', '[page]/[toPage]');
        $snappy->setOption('footer-line', true);
//        $snappy->setOption('no-footer-line', true);         
        $snappy->setOption('footer-font-size', '6');
        //$snappy->setOption('no-background', true);
        //$snappy->setOption('allow', array('/path1', '/path2'));
        //$snappy->setOption('cookie', array('key' => 'value', 'key2' => 'value2'));
        $snappy->generateFromHtml($html, $outputfile);    
        return $outputfile;        
    }    
    
    public function effacerfichierAction($nomfichier)
    {
        $response = new JsonResponse();        
        $lienfichier = $this->getUploadRootDir().'/'.$nomfichier;
        if (file_exists($lienfichier = $this->getUploadRootDir().'/'.$nomfichier)) unlink ($lienfichier);
        $sortie["erreur"] = false;        
        $sortie["nom"] = $nomfichier;
        $sortie["message"] = "Le fichier a été supprimer";          
        $response->setData($sortie);
        return $response;         
        
    }    
    public function imprimerdevisAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);   
//        $parametrepaiement = $em->getRepository('AcmeProsalesBundle:Parametres')->findOneBy(array('nom'=>'paiement'));
//        $nomfichier = "Devis_".$devis->getReference().'.pdf';
//        $outputfile = $this->getUploadRootDir().'/'.$nomfichier;
//        if (!$devis) {
//            throw $this->createNotFoundException('Impossible de trouver le devis recherché.');
//        } 
//        $html = $this->renderView('AcmeProsalesBundle:Devis:imprimer.html.twig', array(
//                            'entity'      => $devis,
//                            'paiement'    => $parametrepaiement,
//        ));
//        if (file_exists($outputfile)) unlink ($outputfile);
//        $this->get('knp_snappy.pdf')->generateFromHtml($html,$outputfile);             
        $response = new JsonResponse();
        $outputfile = $this->creerdevispdf($id);
        $nomfichier = "Devis_".$devis->getReference().'.pdf';         
//        $response->setContent($outputfile);   
        $response->setContent($outputfile);        
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/pdf');        
        $response->headers->set('Content-disposition', 'filename="'.$outputfile.'"'); 
//        $sortie["url"] = __DIR__.'/../../../../web/uploads/documents/'.$nomfichier;
//        $sortie["url"] = $this->getUploadRootDir().'/'.$nomfichier;    
        $sortie["url"] = $this->generateUrl('_welcome_prosales').'../uploads/documents/'.$nomfichier; 
//        $sortie["message"] = "Devis_".$devis->getReference();      
        $sortie["message"] = $nomfichier;           
        $response->setData($sortie);
        return $response; 
    }
    
    private function createMessageForm(Message $entity,$niveau,$iddevis)
    {    
//        $url = $this->generateUrl('AcmeProsalesBundle_upload');
        $href_racine = $this->generateUrl('_welcome_prosales');        
        $form = $this->createFormBuilder($entity)
            ->setAction($this->generateUrl('envoyer_devis', array('id' => $iddevis)))
            ->setMethod('POST')                 
            ->add('a', 'text',array('label'=>'A : ',
                                        'required'=>false,                    
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_a_$niveau'",                                                 
                                                        'placeHolder' => 'a',
                                                        'style'=>"width:300px;",
                                                    )) )
            ->add('contact', 'entity', array('label'=>'Contact : ',
//                                        'empty_value' => 'Choisir un contact',
//                                        'empty_data'  => null,
                                        'required'=>false,
                                        'mapped'=>false,
                                        'class' => 'AcmeProsalesBundle:Contacts',                 
                                         'attr'=> array(
                                                        'data-dojo-id'=> 'listecontacts',
                                                        'data-dojo-type' =>'dijit/form/FilteringSelect',
                                                        'data-dojo-props' =>"id:'devis_contact_$niveau'",                                                 
                                                        'placeHolder' => 'Choisir un contact',
                                                        'style'=>"width:200px;",
                                                        'onChange' =>"Execute_href('POST',this.value+'/editnommelcontact?niveau=$niveau',null);"                                             
//                                                        'onChange' =>"Execute_href('POST',this.value+'/editnommelcontact',null);console.log(this.displayedValue);"
                                        )) )                   
//            ->add('cc', 'text',array('label'=>'Cc : ',
//                                        'required'=>false,                
//                                        'attr'=> array(
//                                                        'data-dojo-type' =>'dijit/form/TextBox',
//                                                        'data-dojo-props' =>"id:'message_cc_$niveau'",                                                 
//                                                        'placeHolder' => 'cc',
//                                                        'style'=>"width:300px;",
//                                                    )) )
            ->add('bcc', 'text',array('label'=>'Cci : ',
                                        'required'=>false,                                          
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_bcc_$niveau'",                                                 
                                                        'placeHolder' => 'cci',
                                                        'style'=>"width:300px;",
                                                    )) )                
            ->add('objet', 'text',array('label'=>'Objet du message : ',
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/form/TextBox',
                                                        'data-dojo-props' =>"id:'message_objet_$niveau'",                                                 
                                                        'placeHolder' => 'nom du dossier',
                                                        'style'=>"width:300px;",
                                                    )) )
            ->add('description', 'textarea',array('label'=>'Message : ',
                                        'required'=>false,
                                        'attr'=> array(
                                                        'data-dojo-type' =>'dijit/Editor',                                            
//                                                        'data-dojo-props' =>"id:'message_contenu_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}]",                                             
//                                                        'data-dojo-props' =>"id:'message_contenu_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true},'dijit/_editor/plugins/AlwaysShowToolbar']",    
                                                        'data-dojo-props' =>"id:'message_description_$niveau',extraPlugins:['foreColor','hiliteColor',{name:'dijit/_editor/plugins/FontChoice', command:'fontName', generic:true}]",                                                                                                
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
                                                        'data-dojo-props' =>"id:'modelcourrier_$niveau'",                                               
                                                        'placeHolder' => 'Modèle du courrier',
                                                        'style'=>"width:300px;",
                                                        'onChange' =>"Afficher_Modele(this.value,$iddevis,$niveau);"                                           
                                                    )) )  
            ->add('file','file',array('label'=>'Pièces Jointes : ', 
                                        'mapped'=>false,
                                        'required'=>false,                
                                        'attr'=> array(
                                                        'multiple'=>'multiple',
                                                        'onChange' =>"handleFiles(this.files,'$href_racine','listefiles_$niveau');"
                                                    )) )  
//            ->add('listefile','choice',array('label'=>'',   
//                                        'mapped'=>false,                
////                                        'choices' => array((count($entity->getFichierjoints())>0?$entity->getFichierjoints()[0]->getClientOriginalName():null) => (count($entity->getFichierjoints())>0?$entity->getFichierjoints()[0]->getClientOriginalName():null).' : '.'.... bytes'),                
//                                        'attr'=> array(
//                                                        'data-dojo-type' =>'dijit/form/MultiSelect',
//                                                        'data-dojo-props' =>"id:'listefiles_$niveau'",
////                                                        'data-dojo-props' =>"id:'listefiles'",                                            
//                                                        'style'=>"width:300px;height:300px;",
////                                                        'onChange' =>"handleFiles(this.files,$this->urlupload);"
//                                                    )) )                 
            ->add('save', 'submit', array('label' => 'Envoyer le message'))
            ->getForm(); 
        return $form;
    }
    public function newMessageAction($id)
    {
        $message = new Message();
        $request = $this->getRequest();  
        $niveau = $request->get("niveau");       
//        $url = $this->generateUrl('AcmeProsalesBundle_upload');
        $href_racine = $this->generateUrl('_welcome_prosales');
        $em = $this->getDoctrine()->getManager(); 
        $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);  
        $contenumessage = "Bonjour ".$devis->getContact()."<br>

                            Comme convenu, je vous transmets le devis ".$devis->getReference()."
                            <br>
                            Cordialement<br>

                            <p style=\"font-family: Arial, sans-serif; margin-top: 0pt;  margin-bottom: 5px; font-size: 10pt; color:#000000;\">
                              <span style=\"font-weight:bold;\">".$devis->getReferent()."</span>
                            </p>";
//        $message->setA($devis->getContact()."(".$devis->getContact()->getEmail().")");      
        $message->setA($devis->getContact()->__toString()."<".$devis->getContact()->getEmail().">");             
        $message->setObjet('Devis : '.$devis->getReference());
        $message->setDescription($contenumessage);         
//        $form = $this->createForm(new MessageType($niveau,$id,$url), $message, array(
//            'action' => $this->generateUrl('envoyer_devis', array('id' => $id)),
//            'method' => 'POST',
//        )); 
//        $fichier  = new UploadedFile($this->creerdevispdf($id),"Devis_".$devis->getReference().'.pdf');
        $message->addFichierjoints(new UploadedFile($this->creerdevispdf($id),"Devis_".$devis->getReference().'.pdf'));
//        echo count($message->getFichierjoints());
//$message->setFile($fichier); 
//$em->persist($message);
        $form   = $this->createMessageForm($message,$niveau,$id);        
        return $this->render('AcmeProsalesBundle:Devis:message.html.twig', array(
            'nomfichier' => $message->getFichierjoints()[0]->getClientOriginalName(),
            'taille' => $message->getFichierjoints()[0]->getClientSize(),
            'message' => $message,
//            'nomfichier' => "Devis_".$devis->getReference().'.pdf',
//            'taille' => filesize($this->creerdevispdf($id)),            
            'href' => $href_racine,
            'niveau' => $niveau,
            'form' => $form->createView(),
        ));           
    }    
    
    public function uploadAction()
    {
        $document = new Document();
        $sortie = array("erreur"=>true,
                        "action" => "upload",
                        "type"=>"piecejointe",
                        "typezone" => "dialogue",            
                        "message"=>"Le Document n'a pas été chargé");
        $form = $this->createForm(new DocumentType(), $document, array(
            'action' => $this->generateUrl('AcmeProsalesBundle_upload'),
            'method' => 'POST',
        )); 
        if ($this->getRequest()->isMethod('POST')) {
            $form->handleRequest($this->getRequest());
//            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $document->upload();
//                $em->persist($document);
//                $em->flush();
                $sortie = array("erreur"=>false,        
                                "message"=>"Le Document a été chargé");               
//            }
        }
        $response = new JsonResponse();     
        $response->setData($sortie);
        return $response;  
//        return array('form' => $form->createView());
    } 
    
    public function envoyerdevisAction(Request $request,$id)
    {
        $message = new Message();        
        $niveau = $request->get("niveau");  
        $sortie = array("erreur"=>true,
                        "action" => "envoyer",
                        "type"=>"devis",
                        "typezone" => "dialogue",            
                        "message"=>"Le Devis n'a pas été envoyé");           
        $form = $this->createMessageForm($message,$niveau,$id);
        $form->handleRequest($request);
//echo $form->get('listefile')->getData();  
//        echo $request->get("listepiecejointes");
        if (strlen($request->get("listepiecejointes"))>0) {          
            $lespiecesjointes = explode(",", $request->get("listepiecejointes"));
            foreach ($lespiecesjointes as $piecejointe) {
                $lienfichier = $this->getUploadRootDir().'/'.$piecejointe; 
                $message->addFichierjoints(new UploadedFile($this->getUploadRootDir().'/'.$piecejointe,$piecejointe));
            }            
        }
//        echo count($message->getFichierjoints());
        if ($form->isValid()) {        
                $em = $this->getDoctrine()->getManager();                
                $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);  
                $action = new Actions();
                $messageaenvoyer = \Swift_Message::newInstance();
                $to = array();
                if (strlen($form->get('a')->getData())>0) {
                    $listedestinataire = explode(";", str_replace(array("<",">"), "{", $form->get('a')->getData()));                    
                    foreach ($listedestinataire as $destinataire) {                    
                        $ledestinataire = explode("{", $destinataire);
                        $to[$ledestinataire[1]] = $ledestinataire[0];
                    }                    
                }                
                $bcc = array();
                if (strlen($form->get('bcc')->getData())>0) {
                    $listedestinatairebcc = explode(";", $form->get('bcc')->getData());
                    if (count($listedestinatairebcc) > 0) {
                        foreach ($listedestinatairebcc as $destinatairebcc) {
                            $bcc[] = $destinatairebcc;
                        }                      
                    }                     
                }             
                if (count($to)>0) {
//                $signweb = $message->embed(\Swift_Image::fromPath($this->generateUrl({_welcome_prosales',array(),true)."../uploads/documents/signatureweb_".$entity->getReferent()->getId().".".$entity->getReferent()->getExtweb()));                 
//                $signweb = $entity->getReferent()->getSignatureWeb()?utf8_encode(stream_get_contents($entity->getReferent()->getSignatureWeb())):null;               
//                $signweb = $message->embed(\Swift_Image::newInstance($img_data, 'image.jpg', 'image/jpeg'));              
                    $messageaenvoyer ->setContentType("text/html")
                                    ->setSubject($form->get('objet')->getData())
                                    ->setFrom($devis->getReferent()->getEmail())
                                    ->setTo($to)                                                    
                                    ->setBody($form->get('description')->getData()); 
                    if (count($bcc)>0) $messageaenvoyer ->setBcc($bcc);                
                    if (count($message->getFichierjoints())>0) {
                        foreach ($message->getFichierjoints() as $fichierjoint) {
                            $messageaenvoyer->attach(\Swift_Attachment::fromPath($this->getUploadRootDir().'/'.$fichierjoint->getClientOriginalName()));
                        }                     
                    }
                    $this->get('mailer')->send($messageaenvoyer);                 
                    $devis->setEnvoimail(true);
                    $em->persist($devis);
                    $em->flush();  
                }                    
                $action->setA($form->get('a')->getData());
                $action->setCci($form->get('bcc')->getData());   
                $action->setReferent($this->getUser());
                $action->setOrganisation($devis->getOrganisation());
                $action->setTypeaction($em->getRepository('AcmeProsalesBundle:Typesaction')->find(2)); 
                $action->setSujet($form->get('objet')->getData());
                $action->setCci($form->get('bcc')->getData());
                $action->setContact($devis->getContact());
                $action->setDescription($form->get('description')->getData());
                $action->setPj(count($message->getFichierjoints())>0);
                if (count($message->getFichierjoints())>0) {
                    foreach ($message->getFichierjoints() as $fichierjoint) {
                        $pjointe =  new Piecesjointes();
                        $pjointe->setDocument($fichierjoint->getClientOriginalName());
                        $pjointe->setAction($action);
                        $action->addPiecejointe($pjointe);
                    }                      
                }                                
                $em->persist($action);
                $em->flush();               
                $sortie = array("erreur"=>false,
                                "action" => "new",
                                "type"=>"message",
                                "idonglet" =>"new_message_".$id,
                                "typezone" => "dialogue",            
                                "message"=>"Le Devis a été envoyé");   
                $sortie["resultat"] = array(
                                            'id'=>$devis->getId(),
                                            'cat'=>'devis',                
                                            'reference'=>$devis->getReference(),
                                            'dossier'=>$devis->getDossier(),
                                            'idorg' => $devis->getOrganisation()->getId(),                
                                            'organisation' => $devis->getOrganisation()->__toString(),
                                            'datedevis' =>  date_format($devis->getCreatedAt(), "d-m-Y"),
                                            'contact'=>$devis->getContact()?$devis->getContact()->__toString():null,
                                            'referent'=>$devis->getReferent()->__toString(),
                                            'totalht'=>$devis->getTotalht(),   
                                            'totaltva'=>$devis->getTotaltva(),  
                                            'totalttc'=>$devis->getTotalttc(),  
                                            'fraisport'=>$devis->getFraisport(),                 
                                            'tauxtva'=>$devis->getTauxTva(),
                                            'mail'=>$devis->getEnvoimail()?"@":" ",
                                            'devisparent'=> $devis->getParent()==null?null:$devis->getParent()->getReference(),   
                                            'listeproduits'=> $devis->getListeproduits()            
                                            );    
                $sortie["action"] = array(
                                            'id'=>$action->getId(),
                                            'cat'=>'action',                
                                            'sujet'=>$action->getSujet(),
                                            'createdAt' =>  date_format($action->getCreatedAt(), "d-m-Y à H:i"),
                                            'contact'=>$action->getContact()?$action->getContact()->__toString():null           
                                            );                   
        }            
        $response = new JsonResponse();     
        $response->setData($sortie);
        return $response;                 
    }    
    /**
    * Creates a form to create a Devis entity.
    *
    * @param Devis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Devis $entity,$niveau,$idorg=0)
    {    
        $form = $this->createForm(new DevisType($niveau,$idorg,json_encode($entity->getListeproduits())), $entity, array(
            'action' => $this->generateUrl('devis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Devis entity.
     *
     */
    public function newAction()
    {
        $entity = new Devis();
        $request = $this->getRequest();        
        $niveau = $request->get("niveau");  
        $idorg = $request->get("idorg");    
        $iddevis = $request->get("iddevis");         
        $entity->setReferent($this->getUser()); 
        $entity->setTauxtva("21.50");
        if ($idorg){ 
            $em = $this->getDoctrine()->getManager();
            $organisation = $em->getRepository('AcmeProsalesBundle:Organisations')->find($idorg);            
            $entity->setOrganisation($organisation);          
        } 
        if ($iddevis){ 
            $em = $this->getDoctrine()->getManager();
            $devisparent = $em->getRepository('AcmeProsalesBundle:Devis')->find($iddevis);            
            $entity = clone $devisparent; 
            $entity->setParent($devisparent);
//            foreach ($devisparent->getLignesdevis() as $key => $lignedevis) {
//                $entity->addLignesdevi($lignedevis);
//            }
        }         
        $form   = $this->createCreateForm($entity,$niveau,$idorg);

        return $this->render('AcmeProsalesBundle:Devis:new.html.twig', array(
            'entity' => $entity,
            'niveau' => $niveau,        
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Devis entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Devis:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Devis entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();        
        $niveau = $request->get("niveau");
        $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }
        $editForm = $this->createEditForm($entity,$niveau);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Devis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Devis entity.
    *
    * @param Devis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Devis $entity,$niveau)
    {
        $form = $this->createForm(new DevisType($niveau,$entity->getOrganisation()->getId(),json_encode($entity->getListeproduits())), $entity, array(        
//        $form = $this->createForm(new DevisType($niveau,$entity->getOrganisation()->getId()), $entity, array(
            'action' => $this->generateUrl('devis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }
    /**
     * Edits an existing Devis entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $niveau = $request->get("niveau");        

        $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity,$niveau);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('devis_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Devis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Devis entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $sortie = array("erreur"=>true,
                        "action" => "delete",
                        "type"=>"devis",
                        "typezone" => "onglet",            
                        "message"=>"Le devis n'a pas été supprimé"); 
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Devis entity.');
            }

            $em->remove($entity);
            $em->flush();
            $sortie["erreur"] = false;
            $sortie["id"] = $id;         
            $sortie["idorg"] = $entity->getOrganisation()->getId();          
            $sortie["message"] = "Le devis a été supprimé";              
//        }
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
//        return $this->redirect($this->generateUrl('devis'));
    }

    /**
     * Creates a form to delete a Devis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
