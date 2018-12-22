<?php

namespace ABMBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use ABMBundle\Entity\Prepaga;
use ABMBundle\Entity\Puesto;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Persona
 */
class Persona
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $nroLegajo;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @var int
     */
    private $edad;

    /**
     * @var string
     */
    private $tipoDoc;

    /**
     * @var string
     */
    private $nroDoc;

    /**
     * @var string
     */
    private $cuil;


   /**
     * @ORM\OneToOne(targetEntity="\ABMBundle\Entity\Prepaga")
     * @JoinColumn(name="prepaga_id", referencedColumnName="codigo")
     */ 
    private $prepaga;
    
  public function __construct()
    {
        $this->prepaga = new ArrayCollection();
    }


   /**
     * @ORM\OneToOne(targetEntity="\ABMBundle\Entity\Puesto")
     * @JoinColumn(name="puesto_id", referencedColumnName="codigo")
     */  
    private $puesto;

    /**
     * @var int
     */
    private $numCelular;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var \DateTime
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     */
    private $fechaFin;


 



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
     * Set nroLegajo
     *
     * @param integer $nroLegajo
     *
     * @return Persona
     */
    public function setNroLegajo($nroLegajo)
    {
        $this->nroLegajo = $nroLegajo;

        return $this;
    }

    /**
     * Get nroLegajo
     *
     * @return integer
     */
    public function getNroLegajo()
    {
        return $this->nroLegajo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Persona
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Persona
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set tipoDoc
     *
     * @param string $tipoDoc
     *
     * @return Persona
     */
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get tipoDoc
     *
     * @return string
     */
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set nroDoc
     *
     * @param string $nroDoc
     *
     * @return Persona
     */
    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;

        return $this;
    }

    /**
     * Get nroDoc
     *
     * @return string
     */
    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    /**
     * Set cuil
     *
     * @param string $cuil
     *
     * @return Persona
     */
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return string
     */
    public function getCuil()
    {
        return $this->cuil;
    }

    /**
     * Set numCelular
     *
     * @param integer $numCelular
     *
     * @return Persona
     */
    public function setNumCelular($numCelular)
    {
        $this->numCelular = $numCelular;

        return $this;
    }

    /**
     * Get numCelular
     *
     * @return integer
     */
    public function getNumCelular()
    {
        return $this->numCelular;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Persona
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Persona
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Persona
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
     * Set prepaga
     *
     * @param \ABMBundle\Entity\Prepaga $prepaga
     * @return Persona
     */
   
   public function setPrepaga(\ABMBundle\Entity\Prepaga $prepaga=null)
   {
    
    $this->prepaga = $prepaga;
    return $this;
    
   }
   
    /**
     * Get prepaga
     *
     * @return \ABMBundle\Entity\Prepaga
     */
   public function getPrepaga()
   {
    
    return $this->prepaga;
   } 
   
   
   
  /**
     * Set puesto
     *
     * @param \ABMBundle\Entity\Puesto $puesto
     * @return Persona
     */
   
   public function setPuesto(\ABMBundle\Entity\Puesto $puesto=null)
   {
    
    $this->puesto = $puesto;
    return $this;
    
   }
    
    
      /**
     * Get puesto
     *
     * @return \ABMBundle\Entity\Puesto
     */
   public function getPuesto()
   {
    
    return $this->puesto;
   } 
   
    
    
    
    
}
