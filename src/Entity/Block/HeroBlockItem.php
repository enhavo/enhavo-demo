<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_hero_block_item')]
class HeroBlockItem
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
        targetEntity: HeroBlock::class,
        inversedBy: 'items',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    private ?HeroBlock $heroBlock = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $position = null;

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

    public function getHeroBlock(): ?HeroBlock
    {
        return $this->heroBlock;
    }

    public function setHeroBlock(?HeroBlock $heroBlock): void
    {
        $this->heroBlock = $heroBlock;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
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
