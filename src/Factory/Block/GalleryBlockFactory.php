<?php

namespace App\Factory\Block;

use App\Entity\Block\GalleryBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class GalleryBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(GalleryBlock::class);
    }
}
