<?php

namespace App\Form\Type\Block;

use App\Entity\Block\SwipeTeaserBlock;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SwipeTeaserBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('titleAlignment', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Left' => 'left',
                    'Right' => 'right',
                    'Centered' => 'centered',
                ],
            ])

            ->add('color', ChoiceType::class, [
                'choices' => [
                    'No Background' => 'no-background',
                ],
            ])

            ->add('items', ListType::class, [
                'sortable' => true,
                'entry_type' => SwipeTeaserBlockItemType::class,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SwipeTeaserBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_swipe_teaser_block';
    }
}
