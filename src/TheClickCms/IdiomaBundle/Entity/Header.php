<?php

namespace TheClickCms\IdiomaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Header
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Header
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
     * @ORM\Column(type="text" , nullable=true)
     */


    private $home;


    /**
     * @ORM\Column(type="text" , nullable=true)
     */

    private $historia;


    /**
     * @ORM\Column(type="text" , nullable=true)
     */

    private $productos;


    /**
     * @ORM\Column(type="text" , nullable=true)
     */

    private $servicios;


    /**
     * @ORM\Column(type="text" , nullable=true)
     */
    
    private $noticias;

    /**
     * @ORM\Column(type="text" , nullable=true)
     */

    private $contacto;



    /**
    * @ORM\Column(type="text" , nullable=true)
    */

    private $idioma;


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
     * Set home
     *
     * @param string $home
     * @return Header
     */
    public function setHome($home)
    {
        $this->home = $home;
    
        return $this;
    }

    /**
     * Get home
     *
     * @return string 
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set historia
     *
     * @param string $historia
     * @return Header
     */
    public function setHistoria($historia)
    {
        $this->historia = $historia;
    
        return $this;
    }

    /**
     * Get historia
     *
     * @return string 
     */
    public function getHistoria()
    {
        return $this->historia;
    }

    /**
     * Set productos
     *
     * @param string $productos
     * @return Header
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;
    
        return $this;
    }

    /**
     * Get productos
     *
     * @return string 
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set servicios
     *
     * @param string $servicios
     * @return Header
     */
    public function setServicios($servicios)
    {
        $this->servicios = $servicios;
    
        return $this;
    }

    /**
     * Get servicios
     *
     * @return string 
     */
    public function getServicios()
    {
        return $this->servicios;
    }

    /**
     * Set noticias
     *
     * @param string $noticias
     * @return Header
     */
    public function setNoticias($noticias)
    {
        $this->noticias = $noticias;
    
        return $this;
    }

    /**
     * Get noticias
     *
     * @return string 
     */
    public function getNoticias()
    {
        return $this->noticias;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Header
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Header
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    
        return $this;
    }

    /**
     * Get idioma
     *
     * @return string 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }
}