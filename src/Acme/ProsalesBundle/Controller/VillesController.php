<?php

namespace Acme\ProsalesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\ProsalesBundle\Entity\Villes;
use Acme\ProsalesBundle\Form\VillesType;

/**
 * Villes controller.
 *
 */
class VillesController extends Controller
{

    /**
     * Lists all Villes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeProsalesBundle:Villes')->findAll();

        return $this->render('AcmeProsalesBundle:Villes:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Villes entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Villes();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('villes_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeProsalesBundle:Villes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Villes entity.
     *
     * @param Villes $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Villes $entity)
    {
        $form = $this->createForm(new VillesType(), $entity, array(
            'action' => $this->generateUrl('villes_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Villes entity.
     *
     */
    public function newAction()
    {
        $entity = new Villes();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeProsalesBundle:Villes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Villes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Villes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Villes entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeProsalesBundle:Villes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Villes entity.
    *
    * @param Villes $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Villes $entity)
    {
        $form = $this->createForm(new VillesType(), $entity, array(
            'action' => $this->generateUrl('villes_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Villes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeProsalesBundle:Villes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('villes_edit', array('id' => $id)));
        }

        return $this->render('AcmeProsalesBundle:Villes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Villes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeProsalesBundle:Villes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Villes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('villes'));
    }

    /**
     * Creates a form to delete a Villes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('villes_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
