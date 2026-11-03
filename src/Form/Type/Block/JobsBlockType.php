<?php

namespace App\Form\Type\Block;

use App\Entity\Block\JobsBlock;
use Enhavo\Bundle\FormBundle\Form\Type\BooleanType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobsBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color', ChoiceType::class, [
                'label' => 'Color',
                'choices' => [
                    'No Background' => 'no_background',
                ],
            ])

            ->add('title', TextType::class, [
                'label' => 'Titel',
            ])

            ->add('titleAlignment', ChoiceType::class, [
                'label' => 'Title alignment',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Left' => 'left',
                    'Right' => 'right',
                    'Centered' => 'centered',
                ],
            ])

            ->add('showFilters', BooleanType::class, [
                'label' => 'Show filters',
            ])

            ->add('mode', ChoiceType::class, [
                'label' => 'Mode',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'All' => 'all',
                    'Tags' => 'tags',
                    'Custom' => 'custom',
                ],
            ])

            ->add('itemsPerPage', IntegerType::class, [
                'label' => 'Items per page',
            ])

            ->add('followingCta', ChoiceType::class, [
                'label' => 'Following cta',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Load More' => 'load_more',
                    'No CTA' => 'no_cta',
                ],
            ])

            ->add('tags', ListType::class, [
                'label' => 'Tags',
                'sortable' => true,
                'entry_type' => JobsBlockTagType::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobsBlock::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_jobs_block';
    }
}
