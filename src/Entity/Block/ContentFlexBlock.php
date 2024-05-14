<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_content_flex_block')]
class ContentFlexBlock extends AbstractBlock
{
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
    private ?string $alignment = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $headline = null;

    #[ORM\OneToMany(
        mappedBy: 'contentFlexBlock',
        targetEntity: ContentFlexBlockItem::class,
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

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(?string $alignment): void
    {
        $this->alignment = $alignment;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): void
    {
        $this->headline = $headline;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(ContentFlexBlockItem $item)
    {
        $this->items->add($item);
        $item->setContentFlexBlock($this);
    }

    public function removeItem(ContentFlexBlockItem $item)
    {
        $this->items->removeElement($item);
        $item->setContentFlexBlock(null);
    }
}
