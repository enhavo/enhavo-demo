<?php

namespace App\Block;

use App\Entity\Block\GalleryBlock;
use App\Factory\Block\GalleryBlockFactory;
use App\Form\Type\Block\GalleryBlockType as GalleryBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => GalleryBlock::class,
            'form' => GalleryBlockFormType::class,
            'factory' => GalleryBlockFactory::class,
            'template' => 'theme/block/gallery.html.twig',
            'label' => 'Gallery',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'gallery_block';
    }
}
