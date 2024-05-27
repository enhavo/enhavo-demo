<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_hero_block')]
class HeroBlock extends AbstractBlock
{
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
    private ?string $layout = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $color = null;

    #[ORM\ManyToOne(
        targetEntity: FileInterface::class,
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([])]
    #[Groups(['endpoint.block'])]
    private ?FileInterface $layer1 = null;

    #[ORM\ManyToOne(
        targetEntity: FileInterface::class,
    )]
    #[ORM\JoinColumn(onDelete: 'SET NULL')]
    #[ORM\OrderBy([
    ])]
    #[Groups(['endpoint.block'])]
    private ?FileInterface $layer2 = null;

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
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $subHeadline = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $text = null;

    #[ORM\OneToMany(
        mappedBy: 'heroBlock',
        targetEntity: HeroBlockItem::class,
        cascade: ['persist', 'refresh', 'remove'],
        orphanRemoval: true,
    )]
    #[ORM\OrderBy([
        'position' => 'asc',
    ])]
    #[Groups(['endpoint.block'])]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): void
    {
        $this->size = $size;
    }

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getLayer1(): ?FileInterface
    {
        return $this->layer1;
    }

    public function setLayer1(?FileInterface $layer1): void
    {
        $this->layer1 = $layer1;
    }

    public function getLayer2(): ?FileInterface
    {
        return $this->layer2;
    }

    public function setLayer2(?FileInterface $layer2): void
    {
        $this->layer2 = $layer2;
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

    public function getSubHeadline(): ?string
    {
        return $this->subHeadline;
    }

    public function setSubHeadline(?string $subHeadline): void
    {
        $this->subHeadline = $subHeadline;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(HeroBlockItem $item)
    {
        $this->items->add($item);
        $item->setHeroBlock($this);
    }

    public function removeItem(HeroBlockItem $item)
    {
        $this->items->removeElement($item);
        $item->setHeroBlock(null);
    }
}
