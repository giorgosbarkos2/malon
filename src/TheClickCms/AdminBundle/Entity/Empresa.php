<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    
    
         /** @ORM\Column(type="string", length=200 , nullable=true) */
    
    
    
    private $pais;
    
    
    
    
           /** @ORM\Column(type="string", length=200 , nullable=true) */
    
    
    private $nombre;
    
    
    
    /** @ORM\Column(type="string", length=200 , nullable=true) */
    
    
    
    private $detalle;

    
    
    /** @ORM\Column(type="datetime") */
    
    
    private $fecha;
    
    
    
    
    /** @ORM\Column(type="string", length=200 , nullable=true) */
    
    
    private $correo;
    
    
    /**
     * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Usuarios", mappedBy="empresa")
     */

    
    private $usuario;
  

    /**
    * @ORM\OneToMany(targetEntity="TheClickCms\AdminBundle\Entity\Fotos", mappedBy="empresa" ,  cascade={"remove"})
    */


    private $fotos;
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fotos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set pais
     *
     * @param string $pais
     * @return Empresa
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Empresa
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
     * Set detalle
     *
     * @param string $detalle
     * @return Empresa
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    
        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Empresa
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Empresa
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Add usuario
     *
     * @param \TheClickCms\AdminBundle\Entity\Usuarios $usuario
     * @return Empresa
     */
    public function addUsuario(\TheClickCms\AdminBundle\Entity\Usuarios $usuario)
    {
        $this->usuario[] = $usuario;
    
        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \TheClickCms\AdminBundle\Entity\Usuarios $usuario
     */
    public function removeUsuario(\TheClickCms\AdminBundle\Entity\Usuarios $usuario)
    {
        $this->usuario->removeElement($usuario);
    }

    /**
     * Get usuario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add fotos
     *
     * @param \TheClickCms\AdminBundle\Entity\Fotos $fotos
     * @return Empresa
     */
    public function addFoto(\TheClickCms\AdminBundle\Entity\Fotos $fotos)
    {
        $this->fotos[] = $fotos;
    
        return $this;
    }

    /**
     * Remove fotos
     *
     * @param \TheClickCms\AdminBundle\Entity\Fotos $fotos
     */
    public function removeFoto(\TheClickCms\AdminBundle\Entity\Fotos $fotos)
    {
        $this->fotos->removeElement($fotos);
    }

    /**
     * Get fotos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotos()
    {
        return $this->fotos;
    }
}