<?php

namespace App\Form\Type;

use App\Entity\NagScreen;
use Enhavo\Bundle\FormBundle\Form\Type\BooleanType;
use Enhavo\Bundle\FormBundle\Form\Type\DateTimeType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NagScreenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('overline', TextType::class, [
                'label' => 'Overline',
            ])

            ->add('title', TextType::class, [
                'label' => 'Title',
            ])

            ->add('text', WysiwygType::class, [
                'label' => 'Text',
            ])

            ->add('action', ChoiceType::class, [
                'label' => 'Action',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Form (Name + E-mail)' => 'form',
                    'Button' => 'button',
                ],
            ])

            ->add('buttonTitle', TextType::class, [
                'label' => 'Button title',
            ])

            ->add('buttonLink', TextType::class, [
                'label' => 'Button link',
            ])

            ->add('public', BooleanType::class, [
                'label' => 'Public',
            ])

            ->add('runFrom', DateTimeType::class, [
                'label' => 'Run from',
            ])

            ->add('runTo', DateTimeType::class, [
                'label' => 'Run to',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NagScreen::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_nag_screen';
    }
}
