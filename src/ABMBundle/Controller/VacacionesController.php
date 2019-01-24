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
            
           $valores = $em->getRepository('ABMBundle:Vacaciones')->findAll();
           $periodos[] = 0;
           
            foreach($valores as $v){
                
              $periodos[] = $v->getPeriodo();
                
            }
            
            
     
            if (in_array($vacacione->getPeriodo(), $periodos)) {
             
             return $this->render('vacaciones/new.html.twig', array(
                                  'vacacione' => $vacacione,
                                  'form' => $form->createView(),
                                  'id' =>$request->get('id'),
                                  'error_periodo' => "El perido ingresado ya existe!",
                    ));    
                
            }else{
            $vacacione->setDiasRestantes($vacacione->getDiasPeriodo());
            $vacacione->setActivo(0);
            $em->persist($vacacione);
            $em->flush();
            }
            
            return $this->redirectToRoute('vacaciones_show', array('id' => $request->get('id')));
        }
      
        return $this->render('vacaciones/new.html.twig', array(
            'vacacione' => $vacacione,
            'form' => $form->createView(),
            'id' =>$request->get('id'),
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
    public function editAction(Request $request)
    {
        
                      
        $em = $this->getDoctrine()->getEntityManager();
        $vacaciones = $em->getRepository('ABMBundle:Vacaciones')->find($request->get('id'));
        
        $form = $this->createFormBuilder($vacaciones )
        ->add('diasPeriodo')
        ->add('conGoce')
        ->add('sinGoce')
        ->add('fechaInicio','date',array('format' => 'dd-MM-yyyy', 'years' => range($vacaciones->getPeriodo(), 2050 , +1)))
        ->add('fechaFin','date',array('format' => 'dd-MM-yyyy', 'years' => range($vacaciones->getPeriodo(), 2050 , +1)))
        ->getForm();
        
        $form->handleRequest($request);
        
     
        
        if ($form->isValid()) {
           
           if($vacaciones->getFechaFin() <= $vacaciones->getFechaInicio())
             {
                  return $this->render('vacaciones/edit.html.twig', array(
                      'vacacione' => $vacaciones,
                      'edit_form' => $form->createView(),
                      'id_persona' => $request->get('id_persona'),
                      'error_fecha' => 'El campo fecha fin debe ser mayor al campo fecha inicio',
                      
                       ));
               
             }
             if( $vacaciones->getConGoce() > $vacaciones->getDiasPeriodo()){
                
                 $resultado =  abs($vacaciones->getConGoce() - $vacaciones->getDiasPeriodo());
                
                 return $this->render('vacaciones/edit.html.twig', array(
                        'vacacione' => $vacaciones,
                        'edit_form' => $form->createView(),
                        'id_persona' => $request->get('id_persona'),
                        'error_dias_restantes' => "Los dias con goce de sueldo no pueden superar a los dias del periodo.
                                                   Debe ingresar los dias restantes(".$resultado."), en dias sin goce de sueldo.",
              )); 
                
             }
             
             
             $vacaciones->setDiasRestantes(abs($vacaciones->getDiasRestantes() - $vacaciones->getConGoce()));
             $em->persist($vacaciones);
             $em->flush();
                     
            }
  

        return $this->render('vacaciones/edit.html.twig', array(
            'vacacione' => $vacaciones,
            'edit_form' => $form->createView(),
            'id_persona' => $request->get('id_persona'),

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
    
    
    public function cerrarPeriodoAction(Request $request){
        
        
        $em = $this->getDoctrine()->getManager();
        $vacaciones = $em->getRepository('ABMBundle:Vacaciones')->find($request->get('id'));
        
        $vacaciones->setActivo(1);
        
        $em->persist($vacaciones);
        $em->flush();
        
        exit();
       
        
    }
    
    
    
    
    
}
