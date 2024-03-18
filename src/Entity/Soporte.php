<?php

namespace App\Entity;

use App\Repository\SoporteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoporteRepository::class)]
class Soporte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne(inversedBy: 'soportList')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Complejidad $comp = null;

    #[ORM\ManyToOne(inversedBy: 'soportesEmp')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Empleado $emp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;


    public function __construct($id=null,$descripcion=null, Complejidad $comp=null, Empleado $emp=null) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->comp = $comp;
        $this->emp = $emp;

    }

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    
    public function getComp(): ?Complejidad
    {
        return $this->comp;
    }

    public function setComp(?Complejidad $comp): static
    {
        $this->comp = $comp;

        return $this;
    }

    public function getEmp(): ?Empleado
    {
        return $this->emp;
    }

    public function setEmp(?Empleado $emp): static
    {
        $this->emp = $emp;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }
}
