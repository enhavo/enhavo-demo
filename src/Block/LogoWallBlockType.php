<?php

namespace App\Block;

use App\Entity\Block\LogoWallBlock;
use App\Form\Type\Block\LogoWallBlockType as LogoWallBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoWallBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'model' => LogoWallBlock::class,
            'form' => LogoWallBlockFormType::class,
            'template' => 'theme/block/logo-wall.html.twig',
            'label' => 'LogoWall',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'logo_wall';
    }
}
