<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Enhavo\Bundle\NavigationBundle\Entity\Content;
use Enhavo\Bundle\NavigationBundle\Entity\Link;
use Enhavo\Bundle\NavigationBundle\Entity\Submenu;
use Enhavo\Bundle\ResourceBundle\Factory\Factory;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Yaml\Yaml;

/**
 * Seeds navigations from fixtures/navigation.yaml.
 *
 * Each entry is a Navigation (name + code). `content` is a tree of nodes; each
 * node has a `type` (submenu | link | page) and an optional nested `content`
 * list (submenu children). The theme loads a navigation by its `code`
 * (e.g. navigation.main) — see config/packages/area.yaml.
 */
class NavigationFixture extends Fixture
{
    private ObjectManager $manager;

    public function __construct(
        #[Autowire(service: 'enhavo_navigation.navigation.factory')]
        private readonly Factory $navigationFactory,
        #[Autowire(service: 'enhavo_navigation.node.factory')]
        private readonly Factory $nodeFactory,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $navigations = Yaml::parseFile($this->projectDir . '/fixtures/navigation.yaml');

        foreach ($navigations as $navData) {
            $navigation = $this->navigationFactory->createNew();
            $navigation->setName($navData['name']);
            $navigation->setCode($navData['code']);

            $position = 0;
            foreach ($navData['content'] ?? [] as $item) {
                $node = $this->buildNode($item, $navigation);
                $node->setPosition($position++);
                $navigation->addNode($node);
            }

            $manager->persist($navigation);
        }

        $manager->flush();
    }

    /**
     * @param array<string, mixed> $item
     */
    private function buildNode(array $item, object $navigation): object
    {
        $type = $item['type'];

        // The node's "subject" (the NavItem) is a plain entity per type.
        $subject = match ($type) {
            'link' => new Link(),
            'submenu' => new Submenu(),
            'page' => new Content(),
            default => throw new \InvalidArgumentException(sprintf('Unsupported navigation type "%s"', $type)),
        };
        if ($type === 'link') {
            $subject->setLink($item['link'] ?? '#');
            $subject->setTarget($item['target'] ?? '_self');
        }

        $node = $this->nodeFactory->createNew();
        $node->setName($type);
        $node->setLabel($item['label'] ?? null);
        $node->setNavigation($navigation);
        $node->setSubject($subject);
        $subject->setNode($node);

        $position = 0;
        foreach ($item['content'] ?? [] as $childItem) {
            $child = $this->buildNode($childItem, $navigation);
            $child->setPosition($position++);
            $child->setParent($node);
            $node->addChild($child);
        }

        $this->manager->persist($subject);
        $this->manager->persist($node);

        return $node;
    }
}
