<?php

namespace App\Factory\Block;

use App\Entity\Block\JobsBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class JobsBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(JobsBlock::class);
    }
}
