<?php

namespace App\Form\Type\Block;

use App\Entity\Block\GalleryBlockItem;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryBlockItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('picture', MediaType::class, [
                'label' => 'Picture',
                'help' => 'Supported formats are jpeg, gif, png, webp',
                'multiple' => false,
                'upload' => false,
            ])

            ->add('title', TextType::class, [
            ])

            ->add('description', TextType::class, [
            ])

            ->add('target', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'self' => '_self',
                    'blank' => '_blank',
                ],
            ])

            ->add('photographerName', TextType::class, [
            ])

            ->add('photographerLink', TextType::class, [
            ])

            ->add('licenseName', TextType::class, [
            ])

            ->add('licenseLink', TextType::class, [
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GalleryBlockItem::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_gallery_block_item';
    }
}
