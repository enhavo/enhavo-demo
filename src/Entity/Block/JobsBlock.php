<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_jobs_block')]
class JobsBlock extends AbstractBlock
{
    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $color = null;

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
    private ?string $titleAlignment = null;

    #[ORM\Column(
        type: Types::BOOLEAN,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?bool $showFilters = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $mode = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $itemsPerPage = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $followingCta = null;

    #[ORM\OneToMany(
        mappedBy: 'jobsBlock',
        targetEntity: JobsBlockTag::class,
        cascade: ['persist', 'refresh', 'remove'],
        orphanRemoval: true,
    )]
    #[ORM\OrderBy([
        'position' => 'asc',
    ])]
    #[Groups(['endpoint.block'])]
    private Collection $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitleAlignment(): ?string
    {
        return $this->titleAlignment;
    }

    public function setTitleAlignment(?string $titleAlignment): void
    {
        $this->titleAlignment = $titleAlignment;
    }

    public function isShowFilters(): ?bool
    {
        return $this->showFilters;
    }

    public function setShowFilters(?bool $showFilters): void
    {
        $this->showFilters = $showFilters;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): void
    {
        $this->mode = $mode;
    }

    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(?int $itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getFollowingCta(): ?string
    {
        return $this->followingCta;
    }

    public function setFollowingCta(?string $followingCta): void
    {
        $this->followingCta = $followingCta;
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(JobsBlockTag $tag): void
    {
        $this->tags->add($tag);
        $tag->setJobsBlock($this);
    }

    public function removeTag(JobsBlockTag $tag): void
    {
        $this->tags->removeElement($tag);
        $tag->setJobsBlock(null);
    }
}
