<?php

namespace App\Entity;

use App\Repository\JuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegoRepository::class)]
class Juego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $imagen = null;

    #[ORM\Column(nullable: true)]
    private ?int $min_jug = null;

    #[ORM\Column(nullable: true)]
    private ?int $max_jug = null;

    #[ORM\ManyToOne(inversedBy: 'juegos')]
    private ?TipoMesa $tipomesa = null;

    #[ORM\OneToMany(targetEntity: Reserva::class, mappedBy: 'juego')]
    private Collection $reservas;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): static
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getMinJug(): ?int
    {
        return $this->min_jug;
    }

    public function setMinJug(?int $min_jug): static
    {
        $this->min_jug = $min_jug;

        return $this;
    }

    public function getMaxJug(): ?int
    {
        return $this->max_jug;
    }

    public function setMaxJug(?int $max_jug): static
    {
        $this->max_jug = $max_jug;

        return $this;
    }

    public function getTipomesa(): ?TipoMesa
    {
        return $this->tipomesa;
    }

    public function setTipomesa(?TipoMesa $tipomesa): static
    {
        $this->tipomesa = $tipomesa;

        return $this;
    }

    /**
     * @return Collection<int, Reserva>
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): static
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas->add($reserva);
            $reserva->setJuego($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): static
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getJuego() === $this) {
                $reserva->setJuego(null);
            }
        }

        return $this;
    }
}
