<?php

namespace App\Block;

use App\Entity\Block\CardBlock;
use App\Factory\Block\CardBlockFactory;
use App\Form\Type\Block\CardBlockType as CardBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => CardBlock::class,
            'form' => CardBlockFormType::class,
            'factory' => CardBlockFactory::class,
            'template' => 'theme/block/card.html.twig',
            'label' => 'Card',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'card';
    }
}
