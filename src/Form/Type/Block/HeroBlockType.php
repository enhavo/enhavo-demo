<?php

namespace App\Form\Type\Block;

use App\Entity\Block\HeroBlock;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeroBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('size', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Big' => 'big',
                    'Small' => 'small',
                ],
            ])

            ->add('layout', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Media-Text' => 'media-text',
                    'Text-Media' => 'text-media',
                ],
            ])

            ->add('color', ChoiceType::class, [
                'choices' => [
                    'Black' => 'black',
                ]
            ])

            ->add('layer1', MediaType::class, [
                'label' => 'Picture',
                'help' => 'Supported formats are jpeg, gif, png, webp',
                'multiple' => false,
                'upload' => false
            ])

            ->add('layer2', MediaType::class, [
                'label' => 'Picture',
                'help' => 'Supported formats are jpeg, gif, png, webp',
                'multiple' => false,
                'upload' => false
            ])

            ->add('overline', TextType::class, [
            ])

            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('subHeadline', TextType::class, [
            ])

            ->add('text', WysiwygType::class, [
            ])

            ->add('items', ListType::class, [
                'sortable' => true,
                'entry_type' => HeroBlockItemType::class,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HeroBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_hero_block';
    }
}
