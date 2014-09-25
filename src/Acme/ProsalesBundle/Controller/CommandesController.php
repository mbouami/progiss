<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Acme\ProsalesBundle\Entity\Commandes;
use Acme\ProsalesBundle\Form\CommandesType;
use Acme\ProsalesBundle\Entity\Lignescommandes;
use Acme\ProsalesBundle\Entity\Lignesdevis;

/**
 * Commandes controller.
 *
 */
class CommandesController extends Controller
{

    /**
     * Lists all Commandes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Commandes')->findAll();

        return $this->render('AcmeProsalesBundle:Commandes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Commandes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Commandes();
        $niveau = $request->get("niveau");  
        $sortie = array("erreur"=>true,
                        "action" => "new",
                        "type"=>"commande",
                        "typezone" => "onglet",                
                        "message"=>"La Commande n'a pas été enregistrée");           
        $form = $this->createCreateForm($entity,0,$niveau);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $iddevis = $form->get('devis')->getData();
            $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($iddevis);              
            $parametrenumcommande = $em->getRepository('AcmeProsalesBundle:Parametres')->findOneBy(array('nom'=>'numcommande'));
            $parametrenumcommande->setValeur($parametrenumcommande->getValeur()+1);
            $entity->setNumcommande($parametrenumcommande->getValeur()); 
            $entity->setTauxtva($devis->getTauxtva());
            $em->persist($entity);
            $em->persist($parametrenumcommande);
            $lignesdevis = $devis->getLignesdevis();
            foreach ($lignesdevis as $key => $lignedevis) {
                    $lignecommande = new Lignescommandes();
                    $lignecommande->setCommande($entity);
                    $lignecommande->setOrdre($lignedevis->getOrdre());
                    $lignecommande->setReference($lignedevis->getReference());
                    $lignecommande->setPrixht($lignedevis->getPrixht());     
                    $lignecommande->setQuantite($lignedevis->getQuantite());       
                    $lignecommande->setRemise($lignedevis->getRemise());      
                    $lignecommande->setTotalht($lignedevis->getTotalht());     
                    $lignecommande->setDescription($lignedevis->getDescription());
                    $entity->addLignescommande($lignecommande);
            }            
            $em->flush();
            $em->remove($devis->getParentOriginedevis());
            $em->flush();            
            $sortie["erreur"] = false;
            $sortie["message"] = "La Commande a été enregistrée avec succès";  
            $sortie["idorg"] = $entity->getOrganisation()->getId();  
            $sortie["iddevis"] = $iddevis;             
            $sortie["idcommande"] = $entity->getId();             
            $sortie["idonglet"] = "new_commande_".$iddevis; 
            $sortie["resultat"] = $entity->getArrayCommandes();
//            return $this->redirect($this->generateUrl('commandes_show', array('id' => $entity->getId())));
        }

//        return $this->render('AcmeProsalesBundle:Commandes:new.html.twig', array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;        
    }

    /**
     * Creates a form to create a Commandes entity.
     *
     * @param Commandes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Commandes $entity,$iddevis,$niveau)
    {
        $form = $this->createForm(new CommandesType($niveau,$iddevis,json_encode($entity->getListeproduits())), $entity, array(
            'action' => $this->generateUrl('commandes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Commandes entity.
     *
     */
    public function newAction()
    {
        $commande = new Commandes();
        $em = $this->getDoctrine()->getManager();        
        $request = $this->getRequest();        
        $niveau = $request->get("niveau"); 
        $iddevis = $request->get("iddevis");  
        $devis = $em->getRepository('AcmeProsalesBundle:Devis')->find($iddevis);       
//        $parametrenumcommande = $em->getRepository('AcmeProsalesBundle:Parametres')->findOneBy(array('nom'=>'numcommande'));
//        $parametrenumcommande->setValeur($parametrenumcommande->getValeur()+1);
//        $commande->setNumcommande($parametrenumcommande->getValeur());         
        $commande->setDossier($devis->getDossier());
        $commande->setContact($devis->getContact());       
        $commande->setReferent($devis->getReferent());          
        $commande->setModereglement($devis->getModereglement());    
        $commande->setOrganisation($devis->getOrganisation());
        $commande->setObservation($devis->getObservation()); 
        $commande->setFraisport($devis->getFraisport());          
        $commande->setTauxtva($devis->getTauxtva());  
        $commande->setTotaltva($devis->getTotaltva()); 
        $commande->setTotalht($devis->getTotalht());          
        $commande->setTotalttc($devis->getTotalttc());  
        $lignesdevis = $devis->getLignesdevis();
        foreach ($lignesdevis as $key => $lignedevis) {
                $lignecommande = new Lignescommandes();
                $lignecommande->setCommande($commande);
                $lignecommande->setOrdre($lignedevis->getOrdre());
                $lignecommande->setReference($lignedevis->getReference());
                $lignecommande->setPrixht($lignedevis->getPrixht());     
                $lignecommande->setQuantite($lignedevis->getQuantite());       
                $lignecommande->setRemise($lignedevis->getRemise());      
                $lignecommande->setTotalht($lignedevis->getTotalht());     
                $lignecommande->setDescription($lignedevis->getDescription());
                $commande->addLignescommande($lignecommande);
        }
        $form   = $this->createCreateForm($commande,$iddevis,$niveau);

        return $this->render('AcmeProsalesBundle:Commandes:new.html.twig', array(
            'entity' => $commande,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Commandes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Commandes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commandes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Commandes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Commandes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Commandes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commandes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Commandes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Commandes entity.
    *
    * @param Commandes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Commandes $entity)
    {
        $form = $this->createForm(new CommandesType(), $entity, array(
            'action' => $this->generateUrl('commandes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }
    /**
     * Edits an existing Commandes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Commandes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commandes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('commandes_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Commandes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Commandes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $sortie = array("erreur"=>true,
                        "action" => "delete",
                        "type"=>"commande",
                        "typezone" => "onglet",            
                        "message"=>"La commande n'a pas été supprimée");         
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Commandes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commandes entity.');
            }

            $em->remove($entity);
            $em->flush();
//        }
            $sortie["erreur"] = false;
            $sortie["id"] = $id;                   
            $sortie["message"] = "La commande a été supprimée";              
//        }
        $response = new JsonResponse();
        $response->setData($sortie);
        return $response;
//        return $this->redirect($this->generateUrl('commandes'));
    }

    /**
     * Creates a form to delete a Commandes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commandes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
