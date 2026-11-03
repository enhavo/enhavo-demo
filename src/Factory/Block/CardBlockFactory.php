<?php

namespace App\Factory\Block;

use App\Entity\Block\CardBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class CardBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(CardBlock::class);
    }
}
