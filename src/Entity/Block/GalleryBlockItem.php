<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_gallery_block_item')]
class GalleryBlockItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $id = null;

    #[ORM\ManyToOne(
        targetEntity: GalleryBlock::class,
        inversedBy: 'items',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    private ?GalleryBlock $galleryBlock = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $position = null;

    #[ORM\ManyToOne(
        targetEntity: FileInterface::class,
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    #[Groups(['endpoint.block'])]
    private ?FileInterface $picture = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $title = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $description = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $target = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $photographerName = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $photographerLink = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $licenseName = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $licenseLink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGalleryBlock(): ?GalleryBlock
    {
        return $this->galleryBlock;
    }

    public function setGalleryBlock(?GalleryBlock $galleryBlock): void
    {
        $this->galleryBlock = $galleryBlock;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getPicture(): ?FileInterface
    {
        return $this->picture;
    }

    public function setPicture(?FileInterface $picture): void
    {
        $this->picture = $picture;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): void
    {
        $this->target = $target;
    }

    public function getPhotographerName(): ?string
    {
        return $this->photographerName;
    }

    public function setPhotographerName(?string $photographerName): void
    {
        $this->photographerName = $photographerName;
    }

    public function getPhotographerLink(): ?string
    {
        return $this->photographerLink;
    }

    public function setPhotographerLink(?string $photographerLink): void
    {
        $this->photographerLink = $photographerLink;
    }

    public function getLicenseName(): ?string
    {
        return $this->licenseName;
    }

    public function setLicenseName(?string $licenseName): void
    {
        $this->licenseName = $licenseName;
    }

    public function getLicenseLink(): ?string
    {
        return $this->licenseLink;
    }

    public function setLicenseLink(?string $licenseLink): void
    {
        $this->licenseLink = $licenseLink;
    }
}
