<?php

namespace App\Block;

use App\Entity\Block\SwipeTeaserBlock;
use App\Factory\Block\SwipeTeaserBlockFactory;
use App\Form\Type\Block\SwipeTeaserBlockType as SwipeTeaserBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SwipeTeaserBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => SwipeTeaserBlock::class,
            'form' => SwipeTeaserBlockFormType::class,
            'factory' => SwipeTeaserBlockFactory::class,
            'template' => 'theme/block/swipe-teaser.html.twig',
            'label' => 'Swipe Teaser',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'swipe_teaser';
    }
}
