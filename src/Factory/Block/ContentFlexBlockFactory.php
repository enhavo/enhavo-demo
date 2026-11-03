<?php

namespace App\Factory\Block;

use App\Entity\Block\ContentFlexBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class ContentFlexBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(ContentFlexBlock::class);
    }
}
