<?php

namespace App\DataFixtures\ORM;

use App\DataFixtures\AbstractFixture;
use Enhavo\Bundle\BlockBundle\Model\NodeInterface;
use Enhavo\Bundle\CommentBundle\Exception\NotFoundException;
use Enhavo\Bundle\NavigationBundle\Model\SubjectInterface;
use Enhavo\Bundle\NavigationBundle\NavItem\NavItem;
use Enhavo\Bundle\NavigationBundle\NavItem\NavItemManager;
use Symfony\Component\PropertyAccess\PropertyAccess;

class NavigationFixture extends AbstractFixture
{
    private $propertyAccessor;

    function __construct()
    {
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
    }

    /**
     * @inheritdoc
     */
    function create($args)
    {
        $navigation = $this->container->get('enhavo_navigation.factory.navigation')->createNew();
        $navigation->setName($args['name']);
        $navigation->setCode($args['code']);

        $this->addNodes($navigation, $args['content']);

        $this->translate($navigation);
        return $navigation;
    }

    function addNodes($resource, $content)
    {
        foreach ($content as $item) {

            $node = null;
            if (isset($item['content'])) {
                $node = $this->createNode(['type' => $item['type']]);
                $this->addNodes($node, $item['content']);

            } else {
                $node = $this->createNode($item);
            }

            if ($node) {
                if (method_exists($resource, 'addNode')) {
                    $resource->addNode($node);

                } else if (method_exists($resource, 'addChild')) {
                    $resource->addChild($node);
                }
            }
        }
    }

    /**
     * @param array $item
     * @return SubjectInterface|null
     */
    function createNode(array $item)
    {
        $type = $item['type'];
        unset($item['type']);

        /** @var NavItemManager */
        $itemManager = $this->container->get('Enhavo\Bundle\NavigationBundle\NavItem\NavItemManager');
        /** @var SubjectInterface $node */
        $node = null;
        try {
            $factory = $itemManager->getFactory($type);
            $node = $factory->createNew();
        } catch (\Exception $ex) {
            print_r($ex->getMessage());echo PHP_EOL;die;
        }

        if ($node) {

            if ($type == 'page' && isset($item['link'])) {
                $page = $this->getPage($item['link']);
                if (!$page) {
                    throw new NotFoundException('Page with name"' . $item['link'] . '" was not found"');
                }
                $node->setContent($page);
            }
            $config = ['target' => 'self'];
            if (isset($item['target'])) {
                $config['target'] = $item['target'];
            }
            $node->setConfiguration($config);

            $accessor = $this->propertyAccessor;
            foreach ($item as $k => $v) {
                if ($accessor->isWritable($node, $k)) {
                    $accessor->setValue($node, $k, $v);
                }

                $content = $node->getContent();
                if ($accessor->isWritable($content, $k)) {
                    $accessor->setValue($content, $k, $v);
                }
            }
        }

        return $node;
    }

    /**
     * @param $slug
     * @return \Enhavo\Bundle\PageBundle\Entity\Page|object|null
     */
    function getPage($slug)
    {
        $page = $this->manager->getRepository('EnhavoPageBundle:Page')->findOneBy([
            'slug' => $slug
        ]);

        return $page;
    }

    /**
     * @inheritdoc
     */
    function getName()
    {
        return 'Navigation';
    }

    /**
     * @inheritdoc
     */
    function getOrder()
    {
        return 30;
    }
}
