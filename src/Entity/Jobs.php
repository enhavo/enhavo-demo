<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_jobs')]
class Jobs
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
    private ?string $title = null;

    #[ORM\OneToMany(
        mappedBy: 'jobs',
        targetEntity: Abteilung::class,
        cascade: ['persist', 'refresh', 'remove'],
        orphanRemoval: true,
    )]
    #[ORM\OrderBy([
        'position' => 'asc',
    ])]
    #[Groups(['endpoint.block'])]
    private Collection $abteilungen;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $ctaTitle = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $url = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $target = null;

    #[ORM\Column(
        type: Types::BOOLEAN,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?bool $public = null;

    public function __construct()
    {
        $this->abteilungen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getAbteilungen(): Collection
    {
        return $this->abteilungen;
    }

    public function addAbteilungen(Abteilung $abteilung): void
    {
        $this->abteilungen->add($abteilung);
        $abteilung->setJobs($this);
    }

    public function removeAbteilungen(Abteilung $abteilung): void
    {
        $this->abteilungen->removeElement($abteilung);
        $abteilung->setJobs(null);
    }

    public function getCtaTitle(): ?string
    {
        return $this->ctaTitle;
    }

    public function setCtaTitle(?string $ctaTitle): void
    {
        $this->ctaTitle = $ctaTitle;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): void
    {
        $this->target = $target;
    }

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(?bool $public): void
    {
        $this->public = $public;
    }
}
