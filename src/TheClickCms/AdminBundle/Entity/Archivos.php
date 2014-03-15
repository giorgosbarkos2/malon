<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Archivos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Archivos
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
    * @ORM\Column(name="url", type="string", length=100 , nullable=true)
    */

    private $url;

    /**
    * @ORM\ManyToOne(targetEntity="TheClickCms\AdminBundle\Entity\Actualizacion", inversedBy="Archivos")
    * @ORM\JoinColumn(name="actualizacion_id", referencedColumnName="id")
    *
    */
    
    private $Actualizacion;


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
     * Set url
     *
     * @param string $url
     * @return Archivos
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
     * Set Actualizacion
     *
     * @param \TheClickCms\AdminBundle\Entity\Actualizacion $actualizacion
     * @return Archivos
     */
    public function setActualizacion(\TheClickCms\AdminBundle\Entity\Actualizacion $actualizacion = null)
    {
        $this->Actualizacion = $actualizacion;
    
        return $this;
    }

    /**
     * Get Actualizacion
     *
     * @return \TheClickCms\AdminBundle\Entity\Actualizacion 
     */
    public function getActualizacion()
    {
        return $this->Actualizacion;
    }
}