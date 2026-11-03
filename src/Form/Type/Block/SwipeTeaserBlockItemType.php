<?php

namespace App\Form\Type\Block;

use App\Entity\Block\SwipeTeaserBlockItem;
use App\Form\Type\Block\Core\CtaType;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SwipeTeaserBlockItemType extends AbstractType
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
                'upload' => true,
            ])

            ->add('overline', TextType::class, [
            ])

            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('text', WysiwygType::class, [
            ])

            ->add('look', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Full' => 'full',
                    'Outline' => 'outline',
                ],
            ])

            ->add('size', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Level 1' => 'level-1',
                    'Level 2' => 'level-2',
                    'Level 3' => 'level-3',
                ],
            ])

            ->add('color', ChoiceType::class, [
                'choices' => [
                    'Black' => 'black',
                ],
            ])
            ->add('cta', CtaType::class, [
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SwipeTeaserBlockItem::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_swipe_teaser_block_item';
    }
}
