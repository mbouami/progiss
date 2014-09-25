<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\ProsalesBundle\Entity\Lignesdevis;
use Acme\ProsalesBundle\Form\LignesdevisType;

/**
 * Lignesdevis controller.
 *
 */
class LignesdevisController extends Controller
{

    /**
     * Lists all Lignesdevis entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Lignesdevis')->findAll();

        return $this->render('AcmeProsalesBundle:Lignesdevis:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Lignesdevis entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Lignesdevis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lignesdevis_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeProsalesBundle:Lignesdevis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Lignesdevis entity.
    *
    * @param Lignesdevis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Lignesdevis $entity)
    {
        $form = $this->createForm(new LignesdevisType(), $entity, array(
            'action' => $this->generateUrl('lignesdevis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Lignesdevis entity.
     *
     */
    public function newAction()
    {
        $entity = new Lignesdevis();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeProsalesBundle:Lignesdevis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lignesdevis entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Lignesdevis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lignesdevis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Lignesdevis:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Lignesdevis entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Lignesdevis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lignesdevis entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Lignesdevis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Lignesdevis entity.
    *
    * @param Lignesdevis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Lignesdevis $entity)
    {
        $form = $this->createForm(new LignesdevisType(), $entity, array(
            'action' => $this->generateUrl('lignesdevis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Lignesdevis entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Lignesdevis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lignesdevis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lignesdevis_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Lignesdevis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Lignesdevis entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Lignesdevis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lignesdevis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lignesdevis'));
    }

    /**
     * Creates a form to delete a Lignesdevis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lignesdevis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
