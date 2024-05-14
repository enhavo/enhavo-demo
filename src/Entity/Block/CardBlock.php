<?php

namespace App\Entity\Block;

use App\Entity\Block\Traits\CtaTrait;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_card_block')]
class CardBlock extends AbstractBlock
{
    use CtaTrait;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $gradient = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $layouts = null;

    #[ORM\ManyToOne(
        targetEntity: FileInterface::class,
        inversedBy: '',
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    #[Groups(['endpoint.block'])]
    private ?FileInterface $media = null;

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
    private ?string $copy = null;

    public function getGradient(): ?string
    {
        return $this->gradient;
    }

    public function setGradient(?string $gradient): void
    {
        $this->gradient = $gradient;
    }

    public function getLayouts(): ?string
    {
        return $this->layouts;
    }

    public function setLayouts(?string $layouts): void
    {
        $this->layouts = $layouts;
    }

    public function getMedia(): ?FileInterface
    {
        return $this->media;
    }

    public function setMedia(?FileInterface $media): void
    {
        $this->media = $media;
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

    public function getCopy(): ?string
    {
        return $this->copy;
    }

    public function setCopy(?string $copy): void
    {
        $this->copy = $copy;
    }
}
