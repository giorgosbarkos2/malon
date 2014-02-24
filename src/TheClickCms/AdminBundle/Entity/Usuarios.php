<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="text" ,nullable=true )
     */
    private $pais;


              /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="text" ,nullable=true )
     */


    private $detalle;


    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text" ,nullable=true )
     */

    private $nombre;

        /**
     * @var string
     *
     * @ORM\Column(name="nusuario", type="text" ,nullable=true )
     */

    private $nusuario;


          /**
     * @var string
     *
     * @ORM\Column(name="email", type="text" ,nullable=true )
     */

    private $email;

     /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="text" ,nullable=true )
     */

    private $contrasena;


             /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="text" ,nullable=true )
     */


    private $cargo;


    /**
     * @ORM\Column(type="string", length=255 , nullable=true )
     */

    private $url;


    /** @ORM\Column(type="datetime") */



    private $fecha;







      /**
     * @ORM\ManyToOne(targetEntity="TheClickCms\AdminBundle\Entity\Empresa", inversedBy="usuarios")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
     */


    private $empresa;


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
     * @return Usuarios
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
     * Set detalle
     *
     * @param string $detalle
     * @return Usuarios
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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuarios
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
     * Set nusuario
     *
     * @param string $nusuario
     * @return Usuarios
     */
    public function setNusuario($nusuario)
    {
        $this->nusuario = $nusuario;
    
        return $this;
    }

    /**
     * Get nusuario
     *
     * @return string 
     */
    public function getNusuario()
    {
        return $this->nusuario;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Usuarios
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    
        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Usuarios
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Usuarios
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Usuarios
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
     * Set empresa
     *
     * @param \TheClickCms\AdminBundle\Entity\Empresa $empresa
     * @return Usuarios
     */
    public function setEmpresa(\TheClickCms\AdminBundle\Entity\Empresa $empresa = null)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get empresa
     *
     * @return \TheClickCms\AdminBundle\Entity\Empresa 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
}