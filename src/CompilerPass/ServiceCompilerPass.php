<?php

namespace App\CompilerPass;

use Enhavo\Bundle\NavigationBundle\NavItem\NavItemManager;
use Enhavo\Bundle\UserBundle\User\UserManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ServiceCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $container->getDefinition(UserManager::class)->setPublic(true);
        $container->getDefinition(NavItemManager::class)->setPublic(true);
    }
}
