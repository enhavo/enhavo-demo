<?php

namespace App\Form\Type;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Public, user-facing contact form. The admin read-only view of submissions
 * uses App\Form\Type\Admin\ContactFormBlockType instead.
 */
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', ChoiceType::class, [
                'label' => 'anrede',
                'placeholder' => 'Auswählen',
                'required' => false,
                'choices' => [
                    'herr' => 'herr',
                    'frau' => 'frau',
                    'divers' => 'divers',
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Vorname',
                'attr' => ['placeholder' => 'Vorname'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nachname',
                'attr' => ['placeholder' => 'Nachname'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['placeholder' => 'Ihre Nachricht'],
            ])
            ->add('disclaimer', CheckboxType::class, [
                'required' => false,
                'label' => $options['disclaimer_label'] ?? null,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
            'disclaimer_label' => null,
        ]);
    }
}
