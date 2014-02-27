<?php

namespace TheClickCms\IdiomaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Idioma
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

    private $nombreidioma;

 
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
     * Set nombreidioma
     *
     * @param string $nombreidioma
     * @return Idioma
     */
    public function setNombreidioma($nombreidioma)
    {
        $this->nombreidioma = $nombreidioma;
    
        return $this;
    }

    /**
     * Get nombreidioma
     *
     * @return string 
     */
    public function getNombreidioma()
    {
        return $this->nombreidioma;
    }
}