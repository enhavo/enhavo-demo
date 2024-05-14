<?php

namespace App\Entity\Block;

use App\Entity\TeamMember;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_team_block_item')]
class TeamBlockItem
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
        targetEntity: TeamBlock::class,
        inversedBy: 'items',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    #[Groups(['endpoint.block'])]
    private ?TeamBlock $teamBlock = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?int $position = null;

    #[ORM\ManyToOne(
        targetEntity: TeamMember::class,
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    private ?TeamMember $teamMember = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamBlock(): ?TeamBlock
    {
        return $this->teamBlock;
    }

    public function setTeamBlock(?TeamBlock $teamBlock): void
    {
        $this->teamBlock = $teamBlock;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getTeamMember(): ?TeamMember
    {
        return $this->teamMember;
    }

    public function setTeamMember(?TeamMember $teamMember): void
    {
        $this->teamMember = $teamMember;
    }
}
