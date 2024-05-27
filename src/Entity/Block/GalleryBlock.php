<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_gallery_block')]
class GalleryBlock extends AbstractBlock
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
    private ?string $layout = null;

    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $itemAlignment = null;

    #[ORM\Column(
        type: Types::BOOLEAN,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?bool $lightBox = false;

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
    private ?string $amountOfColumns = null;

    #[ORM\OneToMany(
        mappedBy: 'galleryBlock',
        targetEntity: GalleryBlockItem::class,
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
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

    public function getLayout(): ?string
    {
        return $this->layout;
    }

    public function setLayout(?string $layout): void
    {
        $this->layout = $layout;
    }

    public function getItemAlignment(): ?string
    {
        return $this->itemAlignment;
    }

    public function setItemAlignment(?string $itemAlignment): void
    {
        $this->itemAlignment = $itemAlignment;
    }

    public function getLightBox(): ?string
    {
        return $this->lightBox;
    }

    public function setLightBox(?string $lightBox): void
    {
        $this->lightBox = $lightBox;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getAmountOfColumns(): ?string
    {
        return $this->amountOfColumns;
    }

    public function setAmountOfColumns(?string $amountOfColumns): void
    {
        $this->amountOfColumns = $amountOfColumns;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(GalleryBlockItem $item)
    {
        $this->items->add($item);
        $item->setGalleryBlock($this);
    }

    public function removeItem(GalleryBlockItem $item)
    {
        $this->items->removeElement($item);
        $item->setGalleryBlock(null);
    }
}
