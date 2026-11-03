<?php

namespace App\Factory\Block;

use App\Entity\Block\HeroBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class HeroBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(HeroBlock::class);
    }
}
