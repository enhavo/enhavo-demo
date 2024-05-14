<?php

namespace App\Block;

use App\Entity\Block\TeamBlock;
use App\Factory\Block\TeamBlockFactory;
use App\Form\Type\Block\TeamBlockType as TeamBlockFormType;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamBlockType extends AbstractBlockType
{
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults([
            'model' => TeamBlock::class,
            'form' => TeamBlockFormType::class,
            'factory' => TeamBlockFactory::class,
            'template' => 'theme/block/team.html.twig',
            'label' => 'Team',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'team';
    }
}
