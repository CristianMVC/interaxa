<?php

namespace ABMBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vacaciones
 */
class Vacaciones
{
    /**
     * @var int
     */
    private $id;
    
        
    /**
     * @ORM\ManyToOne(targetEntity="\ABMBundle\Entity\Persona")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */  
      
     private $personas;   
     
    
    /**
     * @var int
     */
     
    private $periodo;


    /**
     * @var int
     */
    private $diasPeriodo; 
    
    
    /**
     * @var int
     */
     private $diasRestantes;


    /**
     * @var int
     */
    private $conGoce;

    /**
     * @var int
     */
    private $sinGoce;

    /**
     * @var date
     */
    
    private $fechaInicio;
    
    
      /**
     * @var date
     */
    
    private $fechaFin;
    
    
    /**
     * @var integer
     */
    private $activo;
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set periodo
     *
     * @param integer $periodo
     *
     * @return Vacaciones
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return integer
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
    

    /**
     * Set conGoce
     *
     * @param integer $conGoce
     *
     * @return Vacaciones
     */
    public function setConGoce($conGoce)
    {
        $this->conGoce = $conGoce;

        return $this;
    }

    /**
     * Get conGoce
     *
     * @return integer
     */
    public function getConGoce()
    {
        return $this->conGoce;
    }

    /**
     * Set sinGoce
     *
     * @param integer $sinGoce
     *
     * @return Vacaciones
     */
    public function setSinGoce($sinGoce)
    {
        $this->sinGoce = $sinGoce;

        return $this;
    }

    /**
     * Get sinGoce
     *
     * @return integer
     */
    public function getSinGoce()
    {
        return $this->sinGoce;
    }
    
    
    /**
     * Set diasPeriodo
     *
     * @param integer $diasPeriodo
     *
     * @return Vacaciones
     */
    public function setDiasPeriodo($diasPeriodo)
    {
        $this->diasPeriodo = $diasPeriodo;

        return $this;
    }

    /**
     * Get diasPeriodo
     *
     * @return integer
     */
    public function getDiasPeriodo()
    {
        return $this->diasPeriodo;
    }
    
    /**
     * Set diasRestantes
     *
     * @param integer $diasRestantes
     *
     * @return Vacaciones
     */
    public function setDiasRestantes($diasRestantes)
    {
        $this->diasRestantes = $diasRestantes;

        return $this;
    }

    /**
     * Get diasRestantes
     *
     * @return integer
     */
    public function getDiasRestantes()
    {
        return $this->diasRestantes;
    }
    
    
    /**
     * Set fechaInicio
     *
     * @param date $fechaInicio
     *
     * @return Vacaciones
     */
    public function setFechaInicio($fechaInicio = null)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return date
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }            
    
    
    /**
     * Set fechaFin
     *
     * @param date $fechaFin
     *
     * @return Vacaciones
     */
    public function setFechaFin($fechaFin = null)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return date
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }            
    
    
    /**
     * Set activo
     *
     * @param integer $activo
     *
     * @return Vacaciones
     */
    public function setActivo($activo = 0)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return activo
     */
    public function getActivo()
    {
        return $this->activo;
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
