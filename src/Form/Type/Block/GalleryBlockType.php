<?php

namespace App\Form\Type\Block;

use App\Entity\Block\GalleryBlock;
use Enhavo\Bundle\FormBundle\Form\Type\BooleanType;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('color', ChoiceType::class, [
                'choices' => [
                    'No Background' => 'no-background',
                ],
            ])

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

            ->add('layout', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Rows' => 'rows',
                    'Columns' => 'columns',
                ],
            ])

            ->add('itemAlignment', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    'Left' => 'left',
                    'Centered' => 'centered',
                ],
            ])

            ->add('lightBox', BooleanType::class, [
            ])

            ->add('text', WysiwygType::class, [
            ])

            ->add('amountOfColumns', ChoiceType::class, [
                'expanded' => 1,
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ],
            ])

            ->add('items', ListType::class, [
                'sortable' => true,
                'entry_type' => GalleryBlockItemType::class,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GalleryBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_gallery_block';
    }
}
