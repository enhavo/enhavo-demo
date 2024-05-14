<?php

namespace App\Block;

use App\Entity\Block\QuoteBlock;
use App\Factory\Block\QuoteBlockFactory;
use App\Form\Type\Block\QuoteBlockType as QuoteBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuoteBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => QuoteBlock::class,
            'form' => QuoteBlockFormType::class,
            'factory' => QuoteBlockFactory::class,
            'template' => 'theme/block/quote.html.twig',
            'label' => 'Quote',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'quote';
    }
}
