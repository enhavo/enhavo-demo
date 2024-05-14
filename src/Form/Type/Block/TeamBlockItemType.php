<?php

namespace App\Form\Type\Block;

use App\Entity\Block\TeamBlockItem;
use App\Entity\TeamMember;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamBlockItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('teamMember', EntityType::class, [
                'label' => 'Team Member',
                'class' => TeamMember::class,
                'choice_label' => 'lastName',
                'placeholder' => '---',
                'expanded' => false,
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TeamBlockItem::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_team_block_item';
    }
}
