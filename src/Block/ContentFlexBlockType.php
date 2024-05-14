<?php

namespace App\Block;

use App\Entity\Block\ContentFlexBlock;
use App\Factory\Block\ContentFlexBlockFactory;
use App\Form\Type\Block\ContentFlexBlockType as ContentFlexBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentFlexBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => ContentFlexBlock::class,
            'form' => ContentFlexBlockFormType::class,
            'factory' => ContentFlexBlockFactory::class,
            'template' => 'theme/block/content-flex.html.twig',
            'label' => 'Content Flex',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'content_flex';
    }
}
