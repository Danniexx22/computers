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

     
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unidad", inversedBy="computadoras")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     *
     *@var mixed
     */
    private $unidad;


    //news
     /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $ip;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $marcamonitor;

     /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $seriemonitor;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $usuariogenerico;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $noinventario;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $anioadquisicion;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $dominio;

      /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $cantidadusuarios;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $idnodo;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
     private $origen;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $piso;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $tipoconsultorio;

      /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     *@var string
     */
    private $area;


    
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

    /**
     * @return Unidad
     */
    public function getunidad()
    {
        return $this->unidad;
    }
    
    /**
     * @param Unidad $unidad
     *
     * @return static
     */
    public function setunidad(Unidad $unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }


    /**
     * Get the value of ip
     */ 
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set the value of ip
     *
     * @return  self
     */ 
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get the value of marcamonitor
     */ 
    public function getMarcamonitor()
    {
        return $this->marcamonitor;
    }

    /**
     * Set the value of marcamonitor
     *
     * @return  self
     */ 
    public function setMarcamonitor($marcamonitor)
    {
        $this->marcamonitor = $marcamonitor;

        return $this;
    }

    /**
     * Get the value of seriemonitor
     */ 
    public function getSeriemonitor()
    {
        return $this->seriemonitor;
    }

    /**
     * Set the value of seriemonitor
     *
     * @return  self
     */ 
    public function setSeriemonitor($seriemonitor)
    {
        $this->seriemonitor = $seriemonitor;

        return $this;
    }

    /**
     * Get the value of usuariogenerico
     */ 
    public function getUsuariogenerico()
    {
        return $this->usuariogenerico;
    }

    /**
     * Set the value of usuariogenerico
     *
     * @return  self
     */ 
    public function setUsuariogenerico($usuariogenerico)
    {
        $this->usuariogenerico = $usuariogenerico;

        return $this;
    }

    /**
     * Get the value of noinventario
     */ 
    public function getNoinventario()
    {
        return $this->noinventario;
    }

    /**
     * Set the value of noinventario
     *
     * @return  self
     */ 
    public function setNoinventario($noinventario)
    {
        $this->noinventario = $noinventario;

        return $this;
    }

    /**
     * Get the value of anioadquisicion
     */ 
    public function getAnioadquisicion()
    {
        return $this->anioadquisicion;
    }

    /**
     * Set the value of anioadquisicion
     *
     * @return  self
     */ 
    public function setAnioadquisicion($anioadquisicion)
    {
        $this->anioadquisicion = $anioadquisicion;

        return $this;
    }

    /**
     * Get the value of dominio
     */ 
    public function getDominio()
    {
        return $this->dominio;
    }

    /**
     * Set the value of dominio
     *
     * @return  self
     */ 
    public function setDominio($dominio)
    {
        $this->dominio = $dominio;

        return $this;
    }

    /**
     * Get the value of cantidadusuarios
     */ 
    public function getCantidadusuarios()
    {
        return $this->cantidadusuarios;
    }

    /**
     * Set the value of cantidadusuarios
     *
     * @return  self
     */ 
    public function setCantidadusuarios($cantidadusuarios)
    {
        $this->cantidadusuarios = $cantidadusuarios;

        return $this;
    }

    /**
     * Get the value of idnodo
     */ 
    public function getIdnodo()
    {
        return $this->idnodo;
    }

    /**
     * Set the value of idnodo
     *
     * @return  self
     */ 
    public function setIdnodo($idnodo)
    {
        $this->idnodo = $idnodo;

        return $this;
    }

     /**
      * Get the value of origen
      */ 
     public function getOrigen()
     {
          return $this->origen;
     }

     /**
      * Set the value of origen
      *
      * @return  self
      */ 
     public function setOrigen($origen)
     {
          $this->origen = $origen;

          return $this;
     }

    /**
     * Get the value of piso
     */ 
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set the value of piso
     *
     * @return  self
     */ 
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get the value of tipoconsultorio
     */ 
    public function getTipoconsultorio()
    {
        return $this->tipoconsultorio;
    }

    /**
     * Set the value of tipoconsultorio
     *
     * @return  self
     */ 
    public function setTipoconsultorio($tipoconsultorio)
    {
        $this->tipoconsultorio = $tipoconsultorio;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }
}

