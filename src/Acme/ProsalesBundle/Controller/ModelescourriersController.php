<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Acme\ProsalesBundle\Entity\Modelescourriers;
use Acme\ProsalesBundle\Form\ModelescourriersType;

/**
 * Modelescourriers controller.
 *
 */
class ModelescourriersController extends Controller
{
	public function detailmodeleAction()
	{
            $request = $this->getRequest();
            $id = $request->get("id");  
            $detailmodele = array();
            $em = $this->getDoctrine()->getManager();
            $sortie = array("erreur"=>true,
                            "action" => "detail",
                            "type"=>"modelecourrier",              
                            "message"=>"Détail du modèle"); 
            if ($id!=null) {
                $modele = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->find($id); 
                $detailmodele = array('libelle'=>$modele->getLibelle(),
                                      'sujet'=>$modele->getSujet(),                   
                                      'description'=>$modele->getDescription());
                $sortie["erreur"] = false;         
                $sortie["resultat"] = $detailmodele;                  
            } 
            $response = new JsonResponse();
            $response->setData($sortie);
            return $response;             
        } 
    /**
     * Lists all Modelescourriers entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->findAll();

        return $this->render('AcmeProsalesBundle:Modelescourriers:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Modelescourriers entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Modelescourriers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('modelescourriers_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeProsalesBundle:Modelescourriers:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Modelescourriers entity.
     *
     * @param Modelescourriers $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Modelescourriers $entity)
    {
        $form = $this->createForm(new ModelescourriersType(), $entity, array(
            'action' => $this->generateUrl('modelescourriers_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Enregistrer'));

        return $form;
    }

    /**
     * Displays a form to create a new Modelescourriers entity.
     *
     */
    public function newAction()
    {
        $entity = new Modelescourriers();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeProsalesBundle:Modelescourriers:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Modelescourriers entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modelescourriers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Modelescourriers:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modelescourriers entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modelescourriers entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Modelescourriers:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Modelescourriers entity.
    *
    * @param Modelescourriers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Modelescourriers $entity)
    {
        $form = $this->createForm(new ModelescourriersType(), $entity, array(
            'action' => $this->generateUrl('modelescourriers_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Mettre à jour'));

        return $form;
    }
    /**
     * Edits an existing Modelescourriers entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modelescourriers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('modelescourriers_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Modelescourriers:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Modelescourriers entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Modelescourriers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Modelescourriers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('modelescourriers'));
    }

    /**
     * Creates a form to delete a Modelescourriers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modelescourriers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
