<?php

namespace ABMBundle\Controller;

use ABMBundle\Entity\Vacaciones;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vacacione controller.
 *
 */
class VacacionesController extends Controller
{
    /**
     * Lists all vacacione entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vacaciones = $em->getRepository('ABMBundle:Vacaciones')->findAll();

        return $this->render('vacaciones/index.html.twig', array(
            'vacaciones' => $vacaciones,
        ));
    }

    /**
     * Creates a new vacacione entity.
     *
     */
    public function newAction(Request $request)
    {
        
        $vacacione = new Vacaciones();
        $form = $this->createForm('ABMBundle\Form\VacacionesType', $vacacione,array('allow_extra_fields' => $request->get('id')));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $vacacione->setDiasRestantes(0);
            $em->persist($vacacione);
            $em->flush();

            return $this->redirectToRoute('vacaciones_show', array('id' => $vacacione->getId()));
        }
      
        return $this->render('vacaciones/new.html.twig', array(
            'vacacione' => $vacacione,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vacacione entity.
     *
     */
    public function showAction(Request $request)
    {
        
        $repository = $this->getDoctrine()
          ->getRepository('ABMBundle:Persona');
       
        $persona = $repository->find($request->get('id'));
        
        
        return $this->render('vacaciones/show.html.twig', array(
            'vacacione' => $persona->getVacaciones(),
            'persona' => $persona,
            
        ));
    }

    /**
     * Displays a form to edit an existing vacacione entity.
     *
     */
    public function editAction(Request $request, Vacaciones $vacacione)
    {
        $deleteForm = $this->createDeleteForm($vacacione);
        $editForm = $this->createForm('ABMBundle\Form\VacacionesType', $vacacione);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vacaciones_edit', array('id' => $vacacione->getId()));
        }

        return $this->render('vacaciones/edit.html.twig', array(
            'vacacione' => $vacacione,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vacacione entity.
     *
     */
    public function deleteAction(Request $request, Vacaciones $vacacione)
    {
        $form = $this->createDeleteForm($vacacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vacacione);
            $em->flush();
        }

        return $this->redirectToRoute('vacaciones_index');
    }

    /**
     * Creates a form to delete a vacacione entity.
     *
     * @param Vacaciones $vacacione The vacacione entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vacaciones $vacacione)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vacaciones_delete', array('id' => $vacacione->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
