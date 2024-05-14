<?php

namespace App\Block;

use App\Entity\Block\AdvancedTextBlock;
use App\Factory\Block\AdvancedTextBlockFactory;
use App\Form\Type\Block\AdvancedTextBlockType as AdvancedTextBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvancedTextBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => AdvancedTextBlock::class,
            'form' => AdvancedTextBlockFormType::class,
            'factory' => AdvancedTextBlockFactory::class,
            'template' => 'theme/block/advanced-text.html.twig',
            'label' => 'Advanced text',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'advanced_text';
    }
}
