<?php

namespace App\Factory\Block;

use App\Entity\Block\QuoteBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class QuoteBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(QuoteBlock::class);
    }
}
