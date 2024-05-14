<?php

namespace App\Form\Type\Block;

use App\Entity\Block\TeamBlock;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\ListType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('overline', TextType::class, [
            ])

            ->add('headline', HeadLineType::class, [
                'label' => 'Headline',
            ])

            ->add('items', ListType::class, [
                'sortable' => true,
                'entry_type' => TeamBlockItemType::class,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TeamBlock::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_team_block';
    }
}
