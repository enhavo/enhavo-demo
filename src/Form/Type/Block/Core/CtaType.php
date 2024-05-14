<?php

namespace App\Form\Type\Block\Core;

use Enhavo\Bundle\NavigationBundle\Form\Type\TargetType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CtaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('ctaTitle', TextType::class, [
            'label' => 'Titel',
        ]);
        $builder->add('ctaLink', TextType::class, [
            'label' => 'Link',
            'help' => 'Relativer Pfad zu dieser Website (/pfad) oder vollständige URL (https://externe-website.de/pfad',
        ]);
        $builder->add('ctaTarget', TargetType::class, [
            'label' => 'Ziel',
            'choices' => [
                'Aktueller Browser-Tab' => '_self',
                'Neuer Browser-Tab' => '_blank',
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => 'CTA',
            'inherit_data' => true,
        ]);
    }

}
