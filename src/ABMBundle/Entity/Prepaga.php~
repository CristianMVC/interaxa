<?php

namespace ABMBundle\Entity;

/**
 * Prepaga
 */
class Prepaga
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
     * @return Prepaga
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
    
    
    // Hay que utilizar este metodo para que la entidad pueda parsear los datos devueltos en formato String,
    // caso contrario al armar el formulario daria error
    
    public function __toString() 
    {
       return $this->getDescripcion();
    }
    
    
    
    
    
    
    
    
    
}
