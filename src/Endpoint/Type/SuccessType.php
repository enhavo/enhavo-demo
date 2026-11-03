<?php

namespace App\Endpoint\Type;

use Enhavo\Bundle\ApiBundle\Endpoint\AbstractEndpointType;
use Enhavo\Bundle\AppBundle\Endpoint\Type\AreaEndpointType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/success', name: 'success', defaults: [])]

class SuccessType extends AbstractEndpointType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'preview' => false,
            'template' => 'theme/block/success.html.twig',
        ]);
    }

    public static function getParentType(): ?string
    {
        return AreaEndpointType::class;
    }
}
