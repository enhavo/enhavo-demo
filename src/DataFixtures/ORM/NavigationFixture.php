<?php

namespace App\DataFixtures\ORM;

use App\DataFixtures\AbstractFixture;
use Enhavo\Bundle\CommentBundle\Exception\NotFoundException;
use Enhavo\Bundle\NavigationBundle\Entity\Navigation;
use Enhavo\Bundle\NavigationBundle\Model\NodeInterface;
use Enhavo\Bundle\NavigationBundle\Model\SubjectInterface;
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

    /**
     * @param Navigation|NodeInterface $resource
     * @param $content
     */
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
     * @return NodeInterface|null
     */
    function createNode(array $item)
    {
        $type = $item['type'];
        unset($item['type']);

        /** @var NavItemManager */
        $itemManager = $this->container->get('Enhavo\Bundle\NavigationBundle\NavItem\NavItemManager');
        /** @var SubjectInterface $subject */
        $subject = null;
        $node = null;

        try {
            $factory = $itemManager->getFactory($type);
            $subject = $factory->createNew();
        } catch (\Exception $ex) {
            print_r($ex->getMessage());echo PHP_EOL;die;
        }

        if ($subject) {
            if ($type == 'page' && isset($item['link'])) {
                $page = $this->getPage($item['link']);
                if (!$page) {
                    throw new NotFoundException('Page with name"' . $item['link'] . '" was not found"');
                }
                $subject->setContent($page);
            }

            $accessor = $this->propertyAccessor;
            foreach ($item as $k => $v) {
                if ($accessor->isWritable($subject, $k)) {
                    $accessor->setValue($subject, $k, $v);
                }

                $content = $subject->getContent();
                if ($accessor->isWritable($content, $k)) {
                    $accessor->setValue($content, $k, $v);
                }
            }

            /** @var NodeInterface $node */
            $node = $this->container->get('enhavo_navigation.factory.node')->createNew();
            $node->setLabel($item['label']);
            $node->setName(md5($type.$item['label']));
            $node->setSubject($subject);
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
