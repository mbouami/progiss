<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\ProsalesBundle\Entity\Actions;
use Acme\ProsalesBundle\Form\ActionsType;

/**
 * Actions controller.
 *
 */
class ActionsController extends Controller
{

    /**
     * Lists all Actions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Actions')->findAll();

        return $this->render('AcmeProsalesBundle:Actions:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Actions entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Actions();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actions_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeProsalesBundle:Actions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Actions entity.
     *
     * @param Actions $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Actions $entity)
    {
        $form = $this->createForm(new ActionsType(), $entity, array(
            'action' => $this->generateUrl('actions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Actions entity.
     *
     */
    public function newAction()
    {
        $entity = new Actions();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeProsalesBundle:Actions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Actions entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Actions:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Actions entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Actions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Actions entity.
    *
    * @param Actions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Actions $entity)
    {
        $form = $this->createForm(new ActionsType(), $entity, array(
            'action' => $this->generateUrl('actions_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Actions entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Actions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('actions_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Actions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Actions entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Actions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actions'));
    }

    /**
     * Creates a form to delete a Actions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actions_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
