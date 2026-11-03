<?php

namespace App\Entity\Block\Traits;

use Doctrine\ORM\Mapping\Column;
use Symfony\Component\Serializer\Annotation\Groups;

trait CtaTrait
{
    #[Column(nullable: true)]
      #[Groups(['endpoint.block'])]
    private ?string $ctaTitle = null;
    #[Column(nullable: true)]
      #[Groups(['endpoint.block'])]
    private ?string $ctaLink = null;
    #[Column(nullable: true)]
      #[Groups(['endpoint.block'])]
    private ?string $ctaTarget = null;

    public function getCtaTitle(): ?string
    {
        return $this->ctaTitle;
    }

    public function setCtaTitle(?string $ctaTitle): void
    {
        $this->ctaTitle = $ctaTitle;
    }

    public function getCtaLink(): ?string
    {
        return $this->ctaLink;
    }

    public function setCtaLink(?string $ctaLink): void
    {
        $this->ctaLink = $ctaLink;
    }

    public function getCtaTarget(): ?string
    {
        return $this->ctaTarget;
    }

    public function setCtaTarget(?string $ctaTarget): void
    {
        $this->ctaTarget = $ctaTarget;
    }

}
