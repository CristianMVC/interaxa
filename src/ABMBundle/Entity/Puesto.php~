<?php

namespace ABMBundle\Entity;

/**
 * Puesto
 */
class Puesto
{
    /**
     * @var int
     */
    private $codigo;

   
    /**
     * @var string
     */
    private $descripcion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

  

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Puesto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    public function __toString() 
    {
       return $this->getDescripcion();
    }
}
