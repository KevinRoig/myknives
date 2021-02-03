<?php

namespace App\Entity;

use App\Repository\KnifeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KnifeRepository::class)
 */
class Knife
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maker;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $blade_length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $blade_thickness;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $blade_material;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $handle_length;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $handle_material;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="knives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="knife")
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="knife")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMaker(): ?string
    {
        return $this->maker;
    }

    public function setMaker(string $maker): self
    {
        $this->maker = $maker;

        return $this;
    }

    public function getBladeLength(): ?float
    {
        return $this->blade_length;
    }

    public function setBladeLength(?float $blade_length): self
    {
        $this->blade_length = $blade_length;

        return $this;
    }

    public function getBladeThickness(): ?float
    {
        return $this->blade_thickness;
    }

    public function setBladeThickness(?float $blade_thickness): self
    {
        $this->blade_thickness = $blade_thickness;

        return $this;
    }

    public function getBladeMaterial(): ?string
    {
        return $this->blade_material;
    }

    public function setBladeMaterial(?string $blade_material): self
    {
        $this->blade_material = $blade_material;

        return $this;
    }

    public function getTotalLength(): ?float
    {
        return $this->total_length;
    }

    public function setTotalLength(?float $total_length): self
    {
        $this->total_length = $total_length;

        return $this;
    }

    public function getHandleLength(): ?float
    {
        return $this->handle_length;
    }

    public function setHandleLength(?float $handle_length): self
    {
        $this->handle_length = $handle_length;

        return $this;
    }

    public function getHandleMaterial(): ?string
    {
        return $this->handle_material;
    }

    public function setHandleMaterial(?string $handle_material): self
    {
        $this->handle_material = $handle_material;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setKnife($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getKnife() === $this) {
                $image->setKnife(null);
            }
        }

        return $this;
    }
}
