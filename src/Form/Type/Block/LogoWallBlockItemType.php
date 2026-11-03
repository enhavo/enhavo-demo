<?php

namespace App\Form\Type\Block;

use App\Entity\Block\LogoWallBlockItem;
use App\Entity\LogoWall;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoWallBlockItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('logoWall', EntityType::class, [
                'label' => 'Logo',
                'class' => LogoWall::class,
                'choice_label' => 'title',
                'placeholder' => '---',
                'expanded' => false,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LogoWallBlockItem::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_logo_wall_block_item';
    }
}
