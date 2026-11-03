<?php

namespace App\Form\Type\Block;

use App\Entity\Abteilung;
use App\Entity\Block\JobsBlockTag;
use Doctrine\ORM\EntityManagerInterface;
use Enhavo\Bundle\FormBundle\Form\Type\PositionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobsBlockTagType extends AbstractType
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $names = $this->entityManager->createQueryBuilder()
            ->select('DISTINCT a.name')
            ->from(Abteilung::class, 'a')
            ->where('a.name IS NOT NULL')
            ->orderBy('a.name', 'ASC')
            ->getQuery()
            ->getSingleColumnResult();

        $choices = [];
        foreach ($names as $name) {
            $choices[$name] = $name;
        }

        $builder
            ->add('position', PositionType::class, [
            ])

            ->add('name', ChoiceType::class, [
                'label' => 'Abteilung',
                'placeholder' => '---',
                'choices' => $choices,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobsBlockTag::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_jobs_block_tag';
    }
}
