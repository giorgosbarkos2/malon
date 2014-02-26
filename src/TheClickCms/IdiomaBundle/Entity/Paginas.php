<?php

namespace TheClickCms\IdiomaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paginas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Paginas
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
    * @ORM\Column(type="string", length=255 , nullable=true)
    */

    private $seccion;

       /**
    * @ORM\Column(type="string", length=255 ,  nullable=true)
    */

    private $titulo;


    /**
     * @ORM\Column(type="text" , nullable=true)
     */


    private $texto;


    

    /**
    * @ORM\Column(type="string", length=255 , nullable=true)
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
     * Set seccion
     *
     * @param string $seccion
     * @return Paginas
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;
    
        return $this;
    }

    /**
     * Get seccion
     *
     * @return string 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Paginas
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Paginas
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    
        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     * @return Paginas
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