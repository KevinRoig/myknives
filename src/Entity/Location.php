<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $real_location;

    /**
     * @ORM\OneToMany(targetEntity=Knife::class, mappedBy="location")
     */
    private $knife;

    public function __construct()
    {
        $this->knife = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRealLocation(): ?string
    {
        return $this->real_location;
    }

    public function setRealLocation(?string $real_location): self
    {
        $this->real_location = $real_location;

        return $this;
    }

    /**
     * @return Collection|knife[]
     */
    public function getKnife(): Collection
    {
        return $this->knife;
    }

    public function addKnife(knife $knife): self
    {
        if (!$this->knife->contains($knife)) {
            $this->knife[] = $knife;
            $knife->setLocation($this);
        }

        return $this;
    }

    public function removeKnife(knife $knife): self
    {
        if ($this->knife->removeElement($knife)) {
            // set the owning side to null (unless already changed)
            if ($knife->getLocation() === $this) {
                $knife->setLocation(null);
            }
        }

        return $this;
    }
}
