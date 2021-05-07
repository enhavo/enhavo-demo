<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CtaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('label', TextType::class, array(
            'label' => 'Title'
        ));
        $builder->add('link', TextType::class, array(
            'label' => 'Link'
        ));
        if ($options['description_text']) {
            $builder->add('descriptionText', TextType::class, array(
                'label' => 'Description'
            ));
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'description_text' => false,
            'attr' => [
                'class' => 'cta-form-container'
            ]
        ));
    }
}
