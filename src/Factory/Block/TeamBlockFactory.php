<?php

namespace App\Factory\Block;

use App\Entity\Block\TeamBlock;
use Enhavo\Bundle\BlockBundle\Factory\BlockFactory;

class TeamBlockFactory extends BlockFactory
{
    public function __construct()
    {
        parent::__construct(TeamBlock::class);
    }
}
