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
     * @var int
     */
    private $totalDias;

    /**
     * @ORM\ManyToOne(targetEntity="\ABMBundle\Entity\Persona")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */  
      
     private $personas; 

    /**
     * @ORM\OneToMany(targetEntity="Fecha", mappedBy="licencias")
     */
     private $fechas;



     public function __construct()
     {
        $this->fechas = new ArrayCollection();
     }

     /**
     * @return Collection
     */
     public function getFechas() {
        return $this->fechas;
     }
     


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

