<?php

namespace App\Form\Type\Block;

use App\Entity\Block\AdvancedTextBlock;
use App\Form\Type\Block\Core\CtaType;
use Enhavo\Bundle\FormBundle\Form\Config\Condition;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvancedTextBlockType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $condition = new Condition();

        $builder
            ->add('text', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Big' => 'big',
                    'Simple' => 'simple',
                    'Headline breaker' => 'headline-breaker',
                ],
                'condition' => $condition,
            ])

            ->add('columns', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'One Column' => 'one-column',
                    'One Column wide' => 'one-column-wide',
                    'Two Columns' => 'two-columns',
                ],
                'condition_observer' => $condition->createObserver('simple'),
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
            'data_class' => AdvancedTextBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_advanced_text_block';
    }
}
