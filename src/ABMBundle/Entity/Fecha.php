<?php

namespace ABMBundle\Entity;

/**
 * Fecha
 */
class Fecha
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $desde;

    /**
     * @var \DateTime
     */
    private $hasta;

    /**
     * @ORM\ManyToOne(targetEntity="\ABMBundle\Entity\Vacaciones")
     * @JoinColumn(name="licencias_id", referencedColumnName="id")
     */  
      
     private $licencias;   


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
     * Set desde
     *
     * @param \DateTime $desde
     *
     * @return Fecha
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;

        return $this;
    }

    /**
     * Get desde
     *
     * @return \DateTime
     */
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * Set hasta
     *
     * @param \DateTime $hasta
     *
     * @return Fecha
     */
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;

        return $this;
    }

    /**
     * Get hasta
     *
     * @return \DateTime
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * Set licencias
     *
     * @param \ABMBundle\Entity\Licencias $licencias
     * @return Fecha
     */
   
   public function setVacaciones(\ABMBundle\Entity\Licencias $licencias)
   {
    
    $this->licencias = $licencias;
    return $this;
    
   }
    
    
    /**
     * Get licencias
     *
     * @return \ABMBundle\Entity\Licencias
     */
   public function getLicencias()
   {
    
    return $this->licencias;
   }

 
}

