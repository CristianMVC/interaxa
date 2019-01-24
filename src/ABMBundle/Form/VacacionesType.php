<?php

namespace ABMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use ABMBundle\Form\Persona;


class VacacionesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id = $options['allow_extra_fields'];
        $builder->add('personas', 'entity', array(
                      'class' => 'ABMBundle:Persona',
                      'label' => 'Nombre de la persona',
                      'query_builder' => function(EntityRepository $er) use ($id) {
                        return $er->createQueryBuilder('u')
                                  ->orderBy('u.nombre', 'ASC')
                                  ->where('u.id ='.$id);
                        },
                        ));
        $builder->add('periodo','integer',array('attr' => array(
        'min' => 2000,
        'max' => 2050
    ),'label' => 'Periodo fecha (2000 - 2050)'   ))->add('diasPeriodo','integer',array('attr' =>array('min' => 1, 'max' => 50)));
        
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABMBundle\Entity\Vacaciones'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'abmbundle_vacaciones';
    }


}
