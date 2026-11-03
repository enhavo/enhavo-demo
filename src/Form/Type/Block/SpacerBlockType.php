<?php

namespace App\Form\Type\Block;

use App\Entity\Block\SpacerBlock;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpacerBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('desktop', TextType::class, [
            ])

            ->add('tablet', TextType::class, [
            ])

            ->add('mobile', TextType::class, [
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SpacerBlock::class,
            'attr' => [
                'class' => 'flex-row'
            ]
        ]);
    }
}
