<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class SpacerBlockExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('default_spacer_unit', array($this, 'defaultUnit')),
        ];
    }

    public function defaultUnit($string)
    {
        if(!preg_match("/-?\d+[^\d]+/", $string)) {
            return $string."px";
        }
        return $string;
    }
}
