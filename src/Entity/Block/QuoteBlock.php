<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity()]
#[ORM\Table(name: 'app_quote_block')]
class QuoteBlock extends AbstractBlock
{
    #[ORM\Column(
        type: Types::STRING,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $alignment = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $text = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    private ?string $author = null;

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    public function setAlignment(?string $alignment): void
    {
        $this->alignment = $alignment;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }
}
