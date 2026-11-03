<?php

namespace App\Form\Type\Block;

use App\Entity\Block\NagScreenBlock;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NagScreenBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NagScreenBlock::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_nag_screen_block';
    }
}
