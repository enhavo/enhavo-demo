<?php

namespace App\Form\Type;

use App\Entity\Jobs;
use Enhavo\Bundle\FormBundle\Form\Type\BooleanType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Type',
            ])

            ->add('abteilungen', ListType::class, [
                'label' => 'Abteilung',
                'sortable' => true,
                'entry_type' => AbteilungType::class,
            ])

            ->add('ctaTitle', TextType::class, [
                'label' => 'Cta title',
            ])

            ->add('url', TextType::class, [
                'label' => 'Url',
            ])

            ->add('target', ChoiceType::class, [
                'label' => 'target',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'self' => '_self',
                    'blank' => '_blank',
                ],
            ])

            ->add('public', BooleanType::class, [
                'label' => 'Öffentlich',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Jobs::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_jobs';
    }
}
