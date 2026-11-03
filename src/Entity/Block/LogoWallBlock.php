<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Enhavo\Bundle\ResourceBundle\Attribute\Duplicate;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'app_logo_wall_block')]
class LogoWallBlock extends AbstractBlock
{
    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $color = null;

    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $title = null;

    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $titleAlignment = null;

    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $itemAlignment = null;

    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $grid = null;

    #[ORM\OneToMany(
        mappedBy: 'logoWallBlock',
        targetEntity: LogoWallBlockItem::class,
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitleAlignment(): ?string
    {
        return $this->titleAlignment;
    }

    public function setTitleAlignment(?string $titleAlignment): void
    {
        $this->titleAlignment = $titleAlignment;
    }

    public function getItemAlignment(): ?string
    {
        return $this->itemAlignment;
    }

    public function setItemAlignment(?string $itemAlignment): void
    {
        $this->itemAlignment = $itemAlignment;
    }

    public function getGrid(): ?string
    {
        return $this->grid;
    }

    public function setGrid(?string $grid): void
    {
        $this->grid = $grid;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(LogoWallBlockItem $item): void
    {
        $this->items->add($item);
        $item->setLogoWallBlock($this);
    }

    public function removeItem(LogoWallBlockItem $item): void
    {
        $this->items->removeElement($item);
        $item->setLogoWallBlock(null);
    }
}
