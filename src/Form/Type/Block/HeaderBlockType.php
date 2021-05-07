<?php

namespace App\Form\Type\Block;

use App\Entity\Block\HeaderBlock;
use App\Form\Type\CtaType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HeaderBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('headline', TextType::class, [
            'label' => 'Titel'
        ]);

        $builder->add('subheadline', TextType::class, [
            'label' => 'Untertitel'
        ]);

        $builder->add('cta', CtaType::class, [
            'label' => 'Button/Link'
        ]);

        $builder->add('picture', MediaType::class, [
            'label' => 'Hintergrundbild',
            'multiple' => false,
            'formats' => [
                'block_header' => 'Zuschneiden (Desktop)',
                'block_header_tablet' => 'Zuschneiden (Tablet)',
                'block_header_mobile' => 'Zuschneiden (Mobile)'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => HeaderBlock::class
        ));
    }
}
