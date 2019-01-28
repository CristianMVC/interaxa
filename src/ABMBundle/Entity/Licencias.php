<?php

namespace ABMBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Licencias
 */
class Licencias
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var int
     */
    private $cantidadDias;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var int
     */
    private $totalDias;

    /**
     * @ORM\ManyToOne(targetEntity="\ABMBundle\Entity\Persona")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */  
      
     private $personas; 


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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Licencias
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set cantidadDias
     *
     * @param integer $cantidadDias
     *
     * @return Licencias
     */
    public function setCantidadDias($cantidadDias)
    {
        $this->cantidadDias = $cantidadDias;

        return $this;
    }

    /**
     * Get cantidadDias
     *
     * @return int
     */
    public function getCantidadDias()
    {
        return $this->cantidadDias;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Licencias
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Licencias
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set totalDias
     *
     * @param integer $totalDias
     *
     * @return Licencias
     */
    public function setTotalDias($totalDias)
    {
        $this->totalDias = $totalDias;

        return $this;
    }

    /**
     * Get totalDias
     *
     * @return int
     */
    public function getTotalDias()
    {
        return $this->totalDias;
    }



/**
     * Set personas
     *
     * @param \ABMBundle\Entity\Persona $personas
     * @return Persona
     */
   
   public function setPersonas(\ABMBundle\Entity\Persona $personas=null)
   {
    
    $this->personas = $personas;
    return $this;
    
   }
    
    
      /**
     * Get personas
     *
     * @return \ABMBundle\Entity\Persona
     */
   public function getPersonas()
   {
    
    return $this->personas;
   }
    
}

