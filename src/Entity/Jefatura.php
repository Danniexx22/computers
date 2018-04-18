<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\JefaturaRepository")
 */
class Jefatura
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Computer", mappedBy="jefserv")
     * 
     */
    private $computadoras;

    public function getId()
    {
        return $this->id;
    }

    public function __toString() {
        return $this->descripcion;
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
    public function removeComputer(Computer $computadora)
    {
        if ($this->getComputadoras()->contains($computadora)) {
            $this->getComputadoras()->removeElement($computadora);
        }

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
