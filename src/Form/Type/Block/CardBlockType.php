<?php

namespace App\Form\Type\Block;

use App\Entity\Block\CardBlock;
use App\Form\Type\Block\Core\CtaType;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gradient', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Yes' => 'yes',
                    'No' => 'no',
                ],
            ])

            ->add('layouts', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Text-Media' => 'text-media',
                    'Media-Text' => 'media-text',
                    'Stacked' => 'stacked',
                ],
            ])

            ->add('media', MediaType::class, [
                'translation_domain' => 'EnhavoMediaBundle',
                'multiple' => false,
            ])

            ->add('overline', TextType::class, [
            ])

            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('copy', WysiwygType::class, [
            ])

            ->add('cta', CtaType::class, [
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CardBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_card_block';
    }
}
