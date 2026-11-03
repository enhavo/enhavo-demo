<?php

namespace App\Block;

use App\Entity\Block\NagScreenBlock;
use App\Form\Type\Block\NagScreenBlockType as NagScreenBlockFormType;
use App\Repository\NagScreenRepository;
use Enhavo\Bundle\ApiBundle\Data\Data;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Enhavo\Bundle\BlockBundle\Model\BlockInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NagScreenBlockType extends AbstractBlockType
{
    public function __construct(
        private readonly NagScreenRepository $nagScreenRepository,
    ) {
    }

    public function createViewData(BlockInterface $block, Data $data, $resource, array $options)
    {
        $data['nagScreen'] = $this->nagScreenRepository->findActive();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'model' => NagScreenBlock::class,
            'form' => NagScreenBlockFormType::class,
            'template' => 'theme/block/nag-screen.html.twig',
            'label' => 'NagScreen',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'nag_screen';
    }
}
