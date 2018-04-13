<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnidadRepository")
 */
class Unidad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    
    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
   private $address;


     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Computer", mappedBy="unidad")
     * 
     */
    private $computadoras;

    public function getId()
    {
        return $this->id;
    }

   /**
    * Get the value of address
    */ 
   public function getAddress()
   {
      return $this->address;
   }

   /**
    * Set the value of address
    *
    * @return  self
    */ 
   public function setAddress($address)
   {
      $this->address = $address;

      return $this;
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

    public function __toString() {
        return $this->name;
    }
}
