<?php

namespace App\Form\Type;

use App\Entity\TeamMember;
use Enhavo\Bundle\FormBundle\Form\Type\BooleanType;
use Enhavo\Bundle\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamMemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture', MediaType::class, [
                'translation_domain' => 'EnhavoMediaBundle',
                'multiple' => false,
            ])

            ->add('firstName', TextType::class, [
            ])

            ->add('lastName', TextType::class, [
            ])

            ->add('email', EmailType::class, [
            ])

            ->add('phone', TextType::class, [
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => TeamMember::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_team_member';
    }
}
