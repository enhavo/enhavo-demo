<?php

namespace App\Block;

use App\Entity\Block\SpacerBlock;

use App\Form\Type\Block\SpacerBlockType as SpacerBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpacerBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'model' => SpacerBlock::class,
            'form' => SpacerBlockFormType::class,
            'template' => 'theme/block/spacer.html.twig',
            'label' => 'Spacer',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'spacer';
    }
}
