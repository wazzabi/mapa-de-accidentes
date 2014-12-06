<?php

namespace Wazzabi\AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accidente")
 */
class Accidente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Wazzabi\AppBundle\Entity\Momento")
     * @ORM\JoinColumn(name="momento_id", referencedColumnName="id", nullable=false)
     *
     * @var Momento
     */
    protected $momento;

    /**
     * @ORM\ManyToOne(targetEntity="Wazzabi\AppBundle\Entity\Gravedad")
     * @ORM\JoinColumn(name="gravedad_id", referencedColumnName="id", nullable=false)
     *
     * @var Gravedad
     */
    protected $intensidad;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     *
     * @var string
     */
    protected $latitud;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     *
     * @var string
     */
    protected $longitud;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var DateTime
     */
    protected $hora;

    /**
     * @ORM\ManyToMany(targetEntity="Wazzabi\AppBundle\Entity\Interviniente")
     * @ORM\JoinTable(name="accidente_intervinientes",
     *          joinColumns={@ORM\JoinColumn(name="accidente_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="interviniente_id", referencedColumnName="id")}
     *          )
     *
     * @var Interviniente[]
     */
    protected $intervinientes;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    protected $descripcion;

    public function __construct()
    {
        $this->intervinientes = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Momento
     */
    public function getMomento()
    {
        return $this->momento;
    }

    /**
     * @param Momento $momento
     *
     * @return $this
     */
    public function setMomento(Momento $momento)
    {
        $this->momento = $momento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntensidad()
    {
        return $this->intensidad;
    }

    /**
     * @param Gravedad $intensidad
     *
     * @return $this
     */
    public function setIntensidad(Gravedad $intensidad)
    {
        $this->intensidad = $intensidad;

        return $this;
    }

    /**
     * @return string
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param string $latitud
     *
     * @return $this
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param string $longitud
     *
     * @return $this
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param DateTime $hora
     *
     * @return $this
     */
    public function setHora(Datetime $hora = null)
    {
        $this->hora = $hora;

        return $this;
    }
}