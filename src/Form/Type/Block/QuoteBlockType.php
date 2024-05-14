<?php

namespace App\Form\Type\Block;

use App\Entity\Block\QuoteBlock;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuoteBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alignment', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Left' => 'left',
                    'Right' => 'right',
                    'Centered' => 'center',
                ],
            ])

            ->add('text', WysiwygType::class, [
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => QuoteBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_quote_block';
    }
}
