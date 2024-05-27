<?php

namespace App\Block;

use App\Entity\Block\HeroBlock;
use App\Factory\Block\HeroBlockFactory;
use App\Form\Type\Block\HeroBlockType as HeroBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeroBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => HeroBlock::class,
            'form' => HeroBlockFormType::class,
            'factory' => HeroBlockFactory::class,
            'template' => 'theme/block/hero.html.twig',
            'label' => 'Hero',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'hero';
    }
}
