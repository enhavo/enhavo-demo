<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Enhavo\Bundle\ResourceBundle\Attribute\Duplicate;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'app_form_block')]
class FormBlock extends AbstractBlock
{
    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $overline = null;

    #[ORM\Column(
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $headline = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $text = null;

    #[ORM\Column(
        type: Types::TEXT,
        nullable: true,
    )]
    #[Groups(['endpoint.block'])]
    #[Duplicate('property', ['groups' => ['duplicate', 'revision', 'restore']])]
    private ?string $disclaimerMessage = null;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getDisclaimerMessage(): ?string
    {
        return $this->disclaimerMessage;
    }

    public function setDisclaimerMessage(?string $disclaimerMessage): void
    {
        $this->disclaimerMessage = $disclaimerMessage;
    }
}
