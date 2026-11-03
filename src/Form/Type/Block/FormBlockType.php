<?php

namespace App\Form\Type\Block;

use App\Entity\Block\FormBlock;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('overline', HeadLineType::class, [
                'label' => 'Overline',
            ])
            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])
            ->add('text', WysiwygType::class, [
                'label' => 'Text',
            ])
            ->add('disclaimerMessage', WysiwygType::class, [
                'label' => 'Disclaimer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormBlock::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_form_block';
    }
}
