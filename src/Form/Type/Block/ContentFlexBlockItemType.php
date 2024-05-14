<?php

namespace App\Form\Type\Block;

use App\Entity\Block\ContentFlexBlockItem;
use App\Form\Type\Block\Core\CtaType;
use Enhavo\Bundle\FormBundle\Form\Type\HeadLineType;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Enhavo\Bundle\FormBundle\Form\Type\WysiwygType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentFlexBlockItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('media', MediaType::class, [
                'label' => 'Picture',
                'help' => 'Supported formats are jpeg, gif, png, webp',
                'multiple' => false,
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
            'data_class' => ContentFlexBlockItem::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_content_flex_block_item';
    }
}
