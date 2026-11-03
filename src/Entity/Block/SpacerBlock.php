<?php

namespace App\Entity\Block;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints\Length;

#[ORM\Entity()]
#[ORM\Table(name: 'app_spacer_block')]
class SpacerBlock extends AbstractBlock
{
    #[ORM\Column(nullable: true)]
    #[Length(max: 255, groups: ['Default', 'default', 'create', 'update'])]
    #[Groups(['endpoint.block'])]
    private ?string $desktop = null;

    #[ORM\Column(nullable: true)]
    #[Length(max: 255, groups: ['Default', 'default', 'create', 'update'])]
    #[Groups(['endpoint.block'])]
    private ?string $tablet = null;

    #[ORM\Column(nullable: true)]
    #[Length(max: 255, groups: ['Default', 'default', 'create', 'update'])]
    #[Groups(['endpoint.block'])]
    private ?string $mobile = null;

    public function getDesktop(): ?string
    {
        return $this->desktop;
    }

    public function setDesktop(?string $desktop): void
    {
        $this->desktop = $desktop;
    }

    public function getTablet(): ?string
    {
        return $this->tablet;
    }

    public function setTablet(?string $tablet): void
    {
        $this->tablet = $tablet;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }
}
