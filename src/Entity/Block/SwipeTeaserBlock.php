<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_swipe_teaser_block')]
class SwipeTeaserBlock extends AbstractBlock
{
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
    private ?string $titleAlignment = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $color = null;

    #[ORM\OneToMany(
        mappedBy: 'swipeTeaserBlock',
        targetEntity: SwipeTeaserBlockItem::class,
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

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): void
    {
        $this->headline = $headline;
    }

    public function getTitleAlignment(): ?string
    {
        return $this->titleAlignment;
    }

    public function setTitleAlignment(?string $titleAlignment): void
    {
        $this->titleAlignment = $titleAlignment;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(SwipeTeaserBlockItem $item)
    {
        $this->items->add($item);
        $item->setSwipeTeaserBlock($this);
    }

    public function removeItem(SwipeTeaserBlockItem $item)
    {
        $this->items->removeElement($item);
        $item->setSwipeTeaserBlock(null);
    }
}
