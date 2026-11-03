<?php

namespace App\Form\Type\Block;

use App\Entity\Block\LogoWallBlock;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoWallBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('color', ChoiceType::class, [
            'choices' => [
                'No Background Color' => 'no_background_color',
            ]
        ])

        ->add('title', TextType::class, [])

        ->add('titleAlignment', ChoiceType::class, [
            'expanded' => true,
            'multiple' => false,
            'choices' => [
               'left' => 'left',
               'center' => 'center',
               'right' => 'right',
           ]
        ])
        ->add('itemAlignment', ChoiceType::class, [
            'expanded' => true,
            'multiple' => false,
            'choices' => [
                'left' => 'left',
                'center' => 'center',
                'right' => 'right',
            ]
        ])
        ->add('grid', ChoiceType::class, [
            'expanded' => true,
            'multiple' => false,
            'choices' => [
              '4 per row' => '4',
              '6 per row' => '6',
            ]
        ])
        ->add('items', ListType::class, [
            'sortable' => true,
            'entry_type' => LogoWallBlockItemType::class,
        ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LogoWallBlock::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_logo_wall_block';
    }
}
