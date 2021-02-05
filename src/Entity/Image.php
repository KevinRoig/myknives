<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 * @Vich\Uploadable
 */
class Image
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
    * @Vich\UploadableField(mapping="poster_file", fileNameProperty="name")
    * @var File
    */
    private $posterFile;

    /**
    * @ORM\Column(type="datetime")
    */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Knife::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $knife;

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

    public function getKnife(): ?knife
    {
        return $this->knife;
    }

    public function setKnife(?knife $knife): self
    {
        $this->knife = $knife;
        return $this;
    }

    public function setPosterFile(File $image = null):Image
    {
        $this->posterFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    public function getPosterFile(): ?File
    {
        return $this->posterFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
