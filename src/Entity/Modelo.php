<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeloRepository")
 */
class Modelo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

     /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $name;

     /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $ram;
     /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $harddisk;
     /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $procesor;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Computer", mappedBy="modelo")
     * 
     */
    private $computadoras;


    public function __toString() {
        return $this->name;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of ram
     */ 
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set the value of ram
     *
     * @return  self
     */ 
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get the value of harddisk
     */ 
    public function getHarddisk()
    {
        return $this->harddisk;
    }

    /**
     * Set the value of harddisk
     *
     * @return  self
     */ 
    public function setHarddisk($harddisk)
    {
        $this->harddisk = $harddisk;

        return $this;
    }

    /**
     * Get the value of procesor
     */ 
    public function getProcesor()
    {
        return $this->procesor;
    }

    /**
     * Set the value of procesor
     *
     * @return  self
     */ 
    public function setProcesor($procesor)
    {
        $this->procesor = $procesor;

        return $this;
    }

   
        /**
     * @return \Traversable
     */
    public function getComputadoras()
    {
        return $this->computadoras ?: $this->computadoras = new ArrayCollection();
    }

   /**
     * @param Computadora $computadora
     *
     * @return static
     */
    public function addComputer(Computer $computadora)
    {
        if (!$this->getComputadoras()->contains($computadora)) {
            $this->getComputadoras()->add($computadora);
        }

        return $this;
    }

    /**
     * @param Computadora $computadora
     *
     * @return static
     */
    public function removeComputadora(Computer $computadora)
    {
        if ($this->getComputadoras()->contains($computadora)) {
            $this->getComputadoras()->removeElement($computadora);
        }

        return $this;
    }
}
