<?php

namespace App\Entity;

use App\Repository\ComplejidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComplejidadRepository::class)]
class Complejidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $valor = null;

    #[ORM\OneToMany(targetEntity: Soporte::class, mappedBy: 'comple_id', orphanRemoval: true)]
    private Collection $soportes;

    #[ORM\OneToMany(targetEntity: Soporte::class, mappedBy: 'comp', orphanRemoval: true)]
    private Collection $soportList;

    public function __construct()
    {
        $this->soportes = new ArrayCollection();
        $this->soportList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function setValor(int $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * @return Collection<int, Soporte>
     */
    public function getSoportes(): Collection
    {
        return $this->soportes;
    }

    

    /**
     * @return Collection<int, Soporte>
     */
    public function getSoportList(): Collection
    {
        return $this->soportList;
    }

    public function addSoportList(Soporte $soportList): static
    {
        if (!$this->soportList->contains($soportList)) {
            $this->soportList->add($soportList);
            $soportList->setComp($this);
        }

        return $this;
    }

    public function removeSoportList(Soporte $soportList): static
    {
        if ($this->soportList->removeElement($soportList)) {
            // set the owning side to null (unless already changed)
            if ($soportList->getComp() === $this) {
                $soportList->setComp(null);
            }
        }

        return $this;
    }
}
