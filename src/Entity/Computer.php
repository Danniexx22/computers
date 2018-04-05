<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ComputerRepository")
 * @UniqueEntity(fields="serie")
 */
class Computer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *@var mixed
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     *
     *
     *@var string
     */
    private $serie;

   /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $marca;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Modelo", inversedBy="computadoras")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="computadoras")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     *
     *@var mixed
     */
    private $categoria;


    
public function getId()
{
    return $this->id;
}

public function setId($id)
{
    $this->id = $id;
    return $this;
}

public function getMarca()
{
    return $this->marca;
}

public function setMarca($marca)
{
    $this->marca = $marca;
    return $this;
}

 /**
     * @return Modelo
     */
    public function getmodelo()
    {
        return $this->modelo;
    }
    
    /**
     * @param Modelo $modelo
     *
     * @return static
     */
    public function setmodelo(Modelo $modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

public function getCodigo()
{
    return $this->codigo;
}

public function setCodigo($codigo)
{
    $this->codigo = $codigo;
    return $this;
}
public function getSerie()
{
    return $this->serie;
}

public function setSerie($serie)
{
    $this->serie = $serie;
    return $this;
}

 

  /**
     * @return Categoria
     */
    public function getcategoria()
    {
        return $this->categoria;
    }
    
    /**
     * @param Categoria $categoria
     *
     * @return static
     */
    public function setcategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}

