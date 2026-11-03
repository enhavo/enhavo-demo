<?php

namespace App\Entity\Block;

use Doctrine\ORM\Mapping as ORM;
use Enhavo\Bundle\BlockBundle\Entity\AbstractBlock;

#[ORM\Entity]
#[ORM\Table(name: 'app_nag_screen_block')]
class NagScreenBlock extends AbstractBlock
{
}
