<?php

namespace ABMBundle\Controller;

use ABMBundle\Entity\Licencias;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Licencia controller.
 *
 */
class LicenciasController extends Controller
{
    /**
     * Lists all licencia entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $licencias = $em->getRepository('ABMBundle:Licencias')->findAll();

        return $this->render('licencias/index.html.twig', array(
            'licencias' => $licencias,
        ));
    }

    /**
     * Creates a new licencia entity.
     *
     */
    public function newAction(Request $request)
    {
        $licencia = new Licencias();

        $em = $this->getDoctrine()->getManager();
        $licencias = $em->getRepository('ABMBundle:Licencias')->findAll();  
        var_dump($licencias);
        die();
        if(empty($licencias)){
          $licencias = null;
    
        }

        $em = $this->getDoctrine()->getEntityManager();
        $persona = $em->getRepository('ABMBundle:Persona')->find($request->get('id'));

        $form = $this->createForm('ABMBundle\Form\LicenciasType', $licencia,array('allow_extra_fields' =>      $request->get('id')));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($licencia);
            $em->flush();
            
            return $this->redirectToRoute('licencias_show', array('id' => $licencia->getId()));
        }

        return $this->render('licencias/new.html.twig', array(
            'licencia' => $licencia,
            'form' => $form->createView(),
            'licencias' => $licencias,
        ));
    }

    /**
     * Finds and displays a licencia entity.
     *
     */
    public function showAction(Licencias $licencia)
    {
        $deleteForm = $this->createDeleteForm($licencia);

        return $this->render('licencias/show.html.twig', array(
            'licencia' => $licencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing licencia entity.
     *
     */
    public function editAction(Request $request, Licencias $licencia)
    {
        $deleteForm = $this->createDeleteForm($licencia);
        $editForm = $this->createForm('ABMBundle\Form\LicenciasType', $licencia);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('licencias_edit', array('id' => $licencia->getId()));
        }

        return $this->render('licencias/edit.html.twig', array(
            'licencia' => $licencia,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a licencia entity.
     *
     */
    public function deleteAction(Request $request, Licencias $licencia)
    {
        $form = $this->createDeleteForm($licencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($licencia);
            $em->flush();
        }

        return $this->redirectToRoute('licencias_index');
    }

    /**
     * Creates a form to delete a licencia entity.
     *
     * @param Licencias $licencia The licencia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Licencias $licencia)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('licencias_delete', array('id' => $licencia->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
