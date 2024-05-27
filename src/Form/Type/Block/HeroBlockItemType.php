<?php

namespace App\Form\Type\Block;

use App\Entity\Block\HeroBlockItem;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeroBlockItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('label', TextType::class, [
            ])

            ->add('target', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'self' => '_self',
                    'blank' => '_blank',
                ],
            ])

            ->add('look', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Full' => 'full',
                    'Outline' => 'outline',
                ],
            ])

            ->add('link', TextType::class, [
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
                    'Grey' => 'grey',
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HeroBlockItem::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_hero_block_item';
    }
}
