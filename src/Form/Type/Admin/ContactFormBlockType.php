<?php

namespace App\Form\Type\Admin;

use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', ChoiceType::class, [
                'attr' => [
                    'disabled' => true,
                ],
                'choices' => [
                    'herr'=>'herr',
                    'frau'=>'frau',
                    'divers'=>'divers',
                ],
            ])
            ->add('firstName', TextType::class, [
                'attr' => [
                    'disabled' => true,
                ],
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'disabled' => true,
                ],
            ])
            ->add('message', WysiwygType::class, [
                'attr' => [
                    'disabled' => true,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }

}