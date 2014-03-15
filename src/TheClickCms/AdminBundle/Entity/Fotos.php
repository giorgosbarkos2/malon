<?php

namespace TheClickCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fotos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fotos
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
     * @ORM\Column(type="string", length=255 , nullable=true )
     */

    private $url;
    
 

    /**
     * @ORM\ManyToOne(targetEntity="TheClickCms\AdminBundle\Entity\Empresa", inversedBy="Fotos")
     * @ORM\JoinColumn(name="empresa_id", referencedColumnName="id")
      * 
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
     * Set url
     *
     * @param string $url
     * @return Fotos
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
     * Set empresa
     *
     * @param \TheClickCms\AdminBundle\Entity\Empresa $empresa
     * @return Fotos
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