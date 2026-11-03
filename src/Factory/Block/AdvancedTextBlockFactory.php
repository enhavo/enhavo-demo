<?php

namespace App\Factory\Block;

use App\Entity\Block\AdvancedTextBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class AdvancedTextBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(AdvancedTextBlock::class);
    }
}
