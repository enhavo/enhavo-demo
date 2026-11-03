<?php

namespace App\Entity\Block;

use App\Entity\LogoWall;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_logo_wall_block_item')]
class LogoWallBlockItem
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
        targetEntity: LogoWallBlock::class,
        inversedBy: 'items',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    private ?LogoWallBlock $logoWallBlock = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $position = null;

    #[ORM\ManyToOne(
        targetEntity: LogoWall::class,
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[Groups(['endpoint.block'])]
    private ?LogoWall $logoWall = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogoWallBlock(): ?LogoWallBlock
    {
        return $this->logoWallBlock;
    }

    public function setLogoWallBlock(?LogoWallBlock $logoWallBlock): void
    {
        $this->logoWallBlock = $logoWallBlock;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getLogoWall(): ?LogoWall
    {
        return $this->logoWall;
    }

    public function setLogoWall(?LogoWall $logoWall): void
    {
        $this->logoWall = $logoWall;
    }
}
