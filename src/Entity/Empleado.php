<?php

namespace App\Entity;

use App\Repository\EmpleadoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpleadoRepository::class)]
class Empleado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: Soporte::class, mappedBy: 'emp', orphanRemoval: true)]
    private Collection $soportesEmp;

    public function __construct()
    {
        $this->soportesEmp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    /**
     * @return Collection<int, Soporte>
     */
    public function getSoportesEmp(): Collection
    {
        return $this->soportesEmp;
    }

    public function addSoportesEmp(Soporte $soportesEmp): static
    {
        if (!$this->soportesEmp->contains($soportesEmp)) {
            $this->soportesEmp->add($soportesEmp);
            $soportesEmp->setEmp($this);
        }

        return $this;
    }

    public function removeSoportesEmp(Soporte $soportesEmp): static
    {
        if ($this->soportesEmp->removeElement($soportesEmp)) {
            // set the owning side to null (unless already changed)
            if ($soportesEmp->getEmp() === $this) {
                $soportesEmp->setEmp(null);
            }
        }

        return $this;
    }
}
