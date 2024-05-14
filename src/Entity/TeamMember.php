<?php

namespace App\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'app_team_member')]
class TeamMember implements ResourceInterface
{
    #[Orm\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    private ?int $id = null;

    #[ORM\ManyToOne(
        targetEntity: FileInterface::class,
        inversedBy: '',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    private ?FileInterface $picture = null;

    #[ORM\Column(
        type: Types::INTEGER,
        nullable: true,
    )]
    private ?int $position = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    private ?string $firstName = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    private ?string $lastName = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    private ?string $email = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPicture(): ?FileInterface
    {
        return $this->picture;
    }

    public function setPicture(?FileInterface $picture): void
    {
        $this->picture = $picture;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }
}
