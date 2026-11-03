<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_nag_screen')]
class NagScreen
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    private ?int $id = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $overline = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $title = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $text = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $action = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $buttonTitle = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $buttonLink = null;

    #[ORM\Column(
        type: Types::BOOLEAN,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?bool $public = null;

    #[ORM\Column(
        type: Types::DATETIME_MUTABLE,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?\DateTimeInterface $runFrom = null;

    #[ORM\Column(
        type: Types::DATETIME_MUTABLE,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?\DateTimeInterface $runTo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getOverline(): ?string
    {
        return $this->overline;
    }

    public function setOverline(?string $overline): void
    {
        $this->overline = $overline;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): void
    {
        $this->action = $action;
    }

    public function getButtonTitle(): ?string
    {
        return $this->buttonTitle;
    }

    public function setButtonTitle(?string $buttonTitle): void
    {
        $this->buttonTitle = $buttonTitle;
    }

    public function getButtonLink(): ?string
    {
        return $this->buttonLink;
    }

    public function setButtonLink(?string $buttonLink): void
    {
        $this->buttonLink = $buttonLink;
    }

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): void
    {
        $this->public = $public;
    }

    public function getRunFrom(): ?\DateTimeInterface
    {
        return $this->runFrom;
    }

    public function setRunFrom(?\DateTimeInterface $runFrom): void
    {
        $this->runFrom = $runFrom;
    }

    public function getRunTo(): ?\DateTimeInterface
    {
        return $this->runTo;
    }

    public function setRunTo(?\DateTimeInterface $runTo): void
    {
        $this->runTo = $runTo;
    }
}
