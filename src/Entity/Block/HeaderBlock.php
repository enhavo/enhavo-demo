<?php

namespace App\Entity\Block;

use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;

class HeaderBlock extends AbstractBlock
{
    /** @var ?string */
    private $headline;

    /** @var ?string */
    private $subheadline;

    /** @var array */
    private $cta = ['label' => '', 'link' => ''];

    /** @var ?FileInterface */
    private $picture;

    /**
     * @return mixed
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param mixed $headline
     */
    public function setHeadline($headline): void
    {
        $this->headline = $headline;
    }

    /**
     * @return mixed
     */
    public function getSubheadline()
    {
        return $this->subheadline;
    }

    /**
     * @param mixed $subheadline
     */
    public function setSubheadline($subheadline): void
    {
        $this->subheadline = $subheadline;
    }

    /**
     * @return array
     */
    public function getCta(): array
    {
        return $this->cta;
    }

    /**
     * @param array $cta
     */
    public function setCta(array $cta): void
    {
        $this->cta = $cta;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }
}
