<?php

namespace App\Form\Extension;

use Enhavo\Bundle\RoutingBundle\Form\Type\RouteType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Requires a non-empty URL on every routable resource (pages, ...).
 *
 * RouteType::empty_data drops the whole route when the path is blank, which
 * removes the page's route and 404s it (e.g. clearing the homepage URL in
 * /admin). A NotBlank constraint blocks saving an empty URL instead.
 */
class RouteTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Re-add the path field (added by RouteType) with a NotBlank constraint.
        $builder->add('path', TextType::class, [
            'label' => false,
            'constraints' => [
                new NotBlank(message: 'The URL must not be empty.'),
            ],
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [RouteType::class];
    }
}
