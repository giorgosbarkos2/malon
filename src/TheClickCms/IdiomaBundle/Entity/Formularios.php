<?php

namespace TheClickCms\IdiomaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formularios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Formularios
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


    private $idioma;


        /** @ORM\Column(type="string", length=200 , nullable=true) */


    private $NombreFormulario;

    

            /** @ORM\Column(type="string", length=200 , nullable=true) */


    private $titulo;
            /** @ORM\Column(type="string", length=200 , nullable=true) */


    private $campo1;
            /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo2;

            /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo3;

            /** @ORM\Column(type="string", length=200 , nullable=true) */
   

    private $campo4;
            /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo5;
            /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo6;
            /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo7;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo8;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo9;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo10;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo11;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo12;

                /** @ORM\Column(type="string", length=200 , nullable=true) */

    private $campo13;

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
     * Set idioma
     *
     * @param string $idioma
     * @return Formularios
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

    /**
     * Set NombreFormulario
     *
     * @param string $nombreFormulario
     * @return Formularios
     */
    public function setNombreFormulario($nombreFormulario)
    {
        $this->NombreFormulario = $nombreFormulario;
    
        return $this;
    }

    /**
     * Get NombreFormulario
     *
     * @return string 
     */
    public function getNombreFormulario()
    {
        return $this->NombreFormulario;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Formularios
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
     * Set campo1
     *
     * @param string $campo1
     * @return Formularios
     */
    public function setCampo1($campo1)
    {
        $this->campo1 = $campo1;
    
        return $this;
    }

    /**
     * Get campo1
     *
     * @return string 
     */
    public function getCampo1()
    {
        return $this->campo1;
    }

    /**
     * Set campo2
     *
     * @param string $campo2
     * @return Formularios
     */
    public function setCampo2($campo2)
    {
        $this->campo2 = $campo2;
    
        return $this;
    }

    /**
     * Get campo2
     *
     * @return string 
     */
    public function getCampo2()
    {
        return $this->campo2;
    }

    /**
     * Set campo3
     *
     * @param string $campo3
     * @return Formularios
     */
    public function setCampo3($campo3)
    {
        $this->campo3 = $campo3;
    
        return $this;
    }

    /**
     * Get campo3
     *
     * @return string 
     */
    public function getCampo3()
    {
        return $this->campo3;
    }

    /**
     * Set campo4
     *
     * @param string $campo4
     * @return Formularios
     */
    public function setCampo4($campo4)
    {
        $this->campo4 = $campo4;
    
        return $this;
    }

    /**
     * Get campo4
     *
     * @return string 
     */
    public function getCampo4()
    {
        return $this->campo4;
    }

    /**
     * Set campo5
     *
     * @param string $campo5
     * @return Formularios
     */
    public function setCampo5($campo5)
    {
        $this->campo5 = $campo5;
    
        return $this;
    }

    /**
     * Get campo5
     *
     * @return string 
     */
    public function getCampo5()
    {
        return $this->campo5;
    }

    /**
     * Set campo6
     *
     * @param string $campo6
     * @return Formularios
     */
    public function setCampo6($campo6)
    {
        $this->campo6 = $campo6;
    
        return $this;
    }

    /**
     * Get campo6
     *
     * @return string 
     */
    public function getCampo6()
    {
        return $this->campo6;
    }

    /**
     * Set campo7
     *
     * @param string $campo7
     * @return Formularios
     */
    public function setCampo7($campo7)
    {
        $this->campo7 = $campo7;
    
        return $this;
    }

    /**
     * Get campo7
     *
     * @return string 
     */
    public function getCampo7()
    {
        return $this->campo7;
    }

    /**
     * Set campo8
     *
     * @param string $campo8
     * @return Formularios
     */
    public function setCampo8($campo8)
    {
        $this->campo8 = $campo8;
    
        return $this;
    }

    /**
     * Get campo8
     *
     * @return string 
     */
    public function getCampo8()
    {
        return $this->campo8;
    }

    /**
     * Set campo9
     *
     * @param string $campo9
     * @return Formularios
     */
    public function setCampo9($campo9)
    {
        $this->campo9 = $campo9;
    
        return $this;
    }

    /**
     * Get campo9
     *
     * @return string 
     */
    public function getCampo9()
    {
        return $this->campo9;
    }

    /**
     * Set campo10
     *
     * @param string $campo10
     * @return Formularios
     */
    public function setCampo10($campo10)
    {
        $this->campo10 = $campo10;
    
        return $this;
    }

    /**
     * Get campo10
     *
     * @return string 
     */
    public function getCampo10()
    {
        return $this->campo10;
    }

    /**
     * Set campo11
     *
     * @param string $campo11
     * @return Formularios
     */
    public function setCampo11($campo11)
    {
        $this->campo11 = $campo11;
    
        return $this;
    }

    /**
     * Get campo11
     *
     * @return string 
     */
    public function getCampo11()
    {
        return $this->campo11;
    }

    /**
     * Set campo12
     *
     * @param string $campo12
     * @return Formularios
     */
    public function setCampo12($campo12)
    {
        $this->campo12 = $campo12;
    
        return $this;
    }

    /**
     * Get campo12
     *
     * @return string 
     */
    public function getCampo12()
    {
        return $this->campo12;
    }

    /**
     * Set campo13
     *
     * @param string $campo13
     * @return Formularios
     */
    public function setCampo13($campo13)
    {
        $this->campo13 = $campo13;
    
        return $this;
    }

    /**
     * Get campo13
     *
     * @return string 
     */
    public function getCampo13()
    {
        return $this->campo13;
    }
}