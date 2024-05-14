<?php

namespace App\Form\Type\Block;

use App\Entity\Block\ContentFlexBlock;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentFlexBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('layout', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Cards' => 'cards',
                    'List' => 'list',
                ],
            ])

            ->add('alignment', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Alignment left' => 'left',
                    'Centered' => 'center',
                ],
            ])

            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('items', ListType::class, [
                'sortable' => true,
                'entry_type' => ContentFlexBlockItemType::class,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContentFlexBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_content_flex_block';
    }
}
