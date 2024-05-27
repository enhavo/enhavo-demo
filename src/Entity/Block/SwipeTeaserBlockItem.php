<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_swipe_teaser_block_item')]
class SwipeTeaserBlockItem
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
        targetEntity: SwipeTeaserBlock::class,
        inversedBy: 'items',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    private ?SwipeTeaserBlock $swipeTeaserBlock = null;

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
    private ?string $overline = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $headline = null;

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
    private ?string $label = null;

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
    private ?string $look = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $link = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $size = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSwipeTeaserBlock(): ?SwipeTeaserBlock
    {
        return $this->swipeTeaserBlock;
    }

    public function setSwipeTeaserBlock(?SwipeTeaserBlock $swipeTeaserBlock): void
    {
        $this->swipeTeaserBlock = $swipeTeaserBlock;
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

    public function getOverline(): ?string
    {
        return $this->overline;
    }

    public function setOverline(?string $overline): void
    {
        $this->overline = $overline;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): void
    {
        $this->headline = $headline;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): void
    {
        $this->target = $target;
    }

    public function getLook(): ?string
    {
        return $this->look;
    }

    public function setLook(?string $look): void
    {
        $this->look = $look;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): void
    {
        $this->size = $size;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }
}
