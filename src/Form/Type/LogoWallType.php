<?php

namespace App\Form\Type;

use App\Entity\LogoWall;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogoWallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
            ])

            ->add('picture', MediaType::class, [
                'translation_domain' => 'EnhavoMediaBundle',
                'multiple' => false,
            ])

            ->add('ctaLink', TextType::class, [
                'label' => 'Link',
            ])

            ->add('target', ChoiceType::class, [
                'label' => 'target',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'self' => 'self',
                    'blank' => 'blank',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LogoWall::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_logo_wall';
    }
}
