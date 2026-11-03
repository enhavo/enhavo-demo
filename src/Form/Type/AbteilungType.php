<?php

namespace App\Form\Type;

use App\Entity\Abteilung;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbteilungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('name', TextType::class, [
                'label' => 'Abteilung',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abteilung::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_abteilung';
    }
}
