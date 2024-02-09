<?php

namespace App\Entity;

use App\Repository\TipoMesaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoMesaRepository::class)]
class TipoMesa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ancho = null;

    #[ORM\Column]
    private ?int $largo = null;

    #[ORM\OneToMany(targetEntity: Mesa::class, mappedBy: 'tipomesa')]
    private Collection $mesas;

    #[ORM\OneToMany(targetEntity: Juego::class, mappedBy: 'tipomesa')]
    private Collection $juegos;

    public function __construct()
    {
        $this->mesas = new ArrayCollection();
        $this->juegos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAncho(): ?int
    {
        return $this->ancho;
    }

    public function setAncho(int $ancho): static
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getLargo(): ?int
    {
        return $this->largo;
    }

    public function setLargo(int $largo): static
    {
        $this->largo = $largo;

        return $this;
    }

    /**
     * @return Collection<int, Mesa>
     */
    public function getMesas(): Collection
    {
        return $this->mesas;
    }

    public function addMesa(Mesa $mesa): static
    {
        if (!$this->mesas->contains($mesa)) {
            $this->mesas->add($mesa);
            $mesa->setTipomesa($this);
        }

        return $this;
    }

    public function removeMesa(Mesa $mesa): static
    {
        if ($this->mesas->removeElement($mesa)) {
            // set the owning side to null (unless already changed)
            if ($mesa->getTipomesa() === $this) {
                $mesa->setTipomesa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Juego>
     */
    public function getJuegos(): Collection
    {
        return $this->juegos;
    }

    public function addJuego(Juego $juego): static
    {
        if (!$this->juegos->contains($juego)) {
            $this->juegos->add($juego);
            $juego->setTipomesa($this);
        }

        return $this;
    }

    public function removeJuego(Juego $juego): static
    {
        if ($this->juegos->removeElement($juego)) {
            // set the owning side to null (unless already changed)
            if ($juego->getTipomesa() === $this) {
                $juego->setTipomesa(null);
            }
        }

        return $this;
    }
}
