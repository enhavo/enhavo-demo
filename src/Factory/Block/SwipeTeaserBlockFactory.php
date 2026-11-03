<?php

namespace App\Factory\Block;

use App\Entity\Block\SwipeTeaserBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class SwipeTeaserBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(SwipeTeaserBlock::class);
    }
}
