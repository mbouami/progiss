<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\ProsalesBundle\Entity\Devis;
use Acme\ProsalesBundle\Form\DevisType;

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
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('devis_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeProsalesBundle:Devis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Devis entity.
     *
     * @param Devis $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Devis $entity)
    {
        $form = $this->createForm(new DevisType(), $entity, array(
            'action' => $this->generateUrl('devis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Devis entity.
     *
     */
    public function newAction()
    {
        $entity = new Devis();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeProsalesBundle:Devis:new.html.twig', array(
            'entity' => $entity,
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
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Devis entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }

        $editForm = $this->createEditForm($entity);
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
    private function createEditForm(Devis $entity)
    {
        $form = $this->createForm(new DevisType(), $entity, array(
            'action' => $this->generateUrl('devis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Devis entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
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
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Devis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Devis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('devis'));
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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}