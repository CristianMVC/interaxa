<?php

namespace ABMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ABMBundle\Form\PrepagaType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nroLegajo')->add('nombre')->add('fechaNacimiento','date',array('format' => 'dd-MM-yyyy', 'years' => range(date('Y'), date('Y') - 60, -1)))->add('edad')->add('tipoDoc',ChoiceType::class,array('choices'=>array('DNI','LE','LC')))->add('nroDoc')->add('cuil')->add('puesto')->add('numCelular')->add('mail')->add('fechaIngreso','date',array('format' => 'dd-MM-yyyy', 'years' => range(date('Y'), date('Y') - 60, -1)))->add('fechaFin','date',array('format' => 'dd-MM-yyyy', 'years' => range(date('Y'), date('Y') - 60, -1)));
        $builder->add('prepaga', 'entity', array(
                      'class' => 'ABMBundle:Prepaga',
                      'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                                  ->orderBy('u.codigo', 'ASC');
                         },
                        ));
        $builder->add('puesto', 'entity', array(
                      'class' => 'ABMBundle:Puesto',
                      'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                                  ->orderBy('u.codigo', 'ASC');
                         },
                        ));
        
           
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABMBundle\Entity\Persona',
            'cascade_validation' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'abmbundle_persona';
    }


}
