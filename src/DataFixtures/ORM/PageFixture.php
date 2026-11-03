<?php

namespace App\DataFixtures\ORM;

use App\Entity\Block\CardBlock;
use App\Entity\Block\ContentFlexBlock;
use App\Entity\Block\ContentFlexBlockItem;
use App\Entity\Block\FormBlock;
use App\Entity\Block\GalleryBlock;
use App\Entity\Block\GalleryBlockItem;
use App\Entity\Block\QuoteBlock;
use App\Entity\Block\SpacerBlock;
use App\Entity\Block\TeamBlock;
use App\Entity\Block\TeamBlockItem;
use App\Entity\TeamMember;
use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Enhavo\Bundle\BlockBundle\Model\BlockInterface;
use Enhavo\Bundle\BlockBundle\Model\NodeInterface;
use Enhavo\Bundle\MediaBundle\Factory\FileFactory;
use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Enhavo\Bundle\PageBundle\Factory\PageFactory;
use Enhavo\Bundle\ResourceBundle\Factory\Factory;
use Enhavo\Bundle\RoutingBundle\Factory\RouteFactory;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Yaml\Yaml;

/**
 * Seeds demo pages (title + route) from fixtures/pages.yaml.
 *
 * A page entry may carry an optional `blocks:` list; each entry becomes a block
 * in the page's content area, stored in the DB. These behave like blocks added
 * in /admin — editors can change or delete them — and the fixtures command
 * restores them from the YAML. The node `name` must match a key in
 * config/packages/enhavo_block.yaml; the render template and view data are
 * resolved from that block type automatically.
 */
class PageFixture extends Fixture
{
    private ObjectManager $manager;

    public function __construct(
        private readonly PageFactory $pageFactory,
        // named autowiring alias -> enhavo_block.node.factory
        private readonly Factory $enhavoBlockNodeFactory,
        private readonly RouteFactory $routeFactory,
        #[Autowire(service: 'enhavo_media.file.factory')]
        private readonly FileFactory $fileFactory,
        #[Autowire('%kernel.project_dir%')]
        private readonly string $projectDir,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $pages = Yaml::parseFile($this->projectDir . '/fixtures/pages.yaml');

        foreach ($pages as $data) {
            /** @var Page $page */
            $page = $this->pageFactory->createNew();
            $page->setTitle($data['title']);
            $page->setSlug($data['slug']);
            $page->setPublic(true);
            $page->setText($data['text'] ?? null);
            $page->setContent($this->createContent($data['blocks'] ?? []));

            $route = $this->routeFactory->createNew();
            $route->setName($data['slug']);
            $route->setStaticPrefix($data['url']);
            $route->setContent($page);
            $page->setRoute($route);

            $manager->persist($page);
            $manager->persist($route);
        }

        $manager->flush();
    }

    /**
     * @param array<int, array<string, mixed>> $blocks
     */
    private function createContent(array $blocks): NodeInterface
    {
        /** @var NodeInterface $root */
        $root = $this->enhavoBlockNodeFactory->createNew();
        $root->setType(NodeInterface::TYPE_ROOT);

        $position = 0;
        foreach ($blocks as $blockData) {
            $node = $this->enhavoBlockNodeFactory->createNew();
            $node->setName($blockData['type']);
            $node->setPosition($position++);
            $node->setEnable(true);
            // setBlock() marks the node as TYPE_BLOCK and links block <-> node.
            // The block reference cascade-persists via the ReferenceSubscriber.
            $node->setBlock($this->createBlock($blockData));
            $node->setParent($root);
            $root->addChild($node);
        }

        return $root;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createBlock(array $data): BlockInterface
    {
        return match ($data['type']) {
            'card' => $this->createCardBlock($data),
            'content_flex' => $this->createContentFlexBlock($data),
            'spacer' => $this->createSpacerBlock($data),
            'form' => $this->createFormBlock($data),
            'quote' => $this->createQuoteBlock($data),
            'gallery_block' => $this->createGalleryBlock($data),
            'team' => $this->createTeamBlock($data),
            default => throw new \InvalidArgumentException(sprintf('Unsupported block type "%s" in fixtures/pages.yaml', $data['type'])),
        };
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createCardBlock(array $data): CardBlock
    {
        $block = new CardBlock();
        $block->setGradient($data['gradient'] ?? null);
        $block->setLayouts($data['layouts'] ?? null);
        $block->setOverline($data['overline'] ?? null);
        $block->setHeadline($data['headline'] ?? null);
        $block->setCopy($data['copy'] ?? null);
        $block->setCtaTitle($data['ctaTitle'] ?? null);
        $block->setCtaLink($data['ctaLink'] ?? null);
        $block->setCtaTarget($data['ctaTarget'] ?? null);

        if (isset($data['media'])) {
            $block->setMedia($this->createImage($data['media']));
        }

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createContentFlexBlock(array $data): ContentFlexBlock
    {
        $block = new ContentFlexBlock();
        $block->setLayout($data['layout'] ?? null);
        $block->setAlignment($data['alignment'] ?? null);
        $block->setHeadline($data['headline'] ?? null);

        $position = 0;
        foreach ($data['items'] ?? [] as $itemData) {
            $item = new ContentFlexBlockItem();
            $item->setPosition($position++);
            $item->setOverline($itemData['overline'] ?? null);
            $item->setHeadline($itemData['headline'] ?? null);
            $item->setCopy($itemData['copy'] ?? null);
            $item->setCtaTitle($itemData['ctaTitle'] ?? null);
            $item->setCtaLink($itemData['ctaLink'] ?? null);
            $item->setCtaTarget($itemData['ctaTarget'] ?? null);
            if (isset($itemData['media'])) {
                $item->setMedia($this->createImage($itemData['media']));
            }
            $item->setContentFlexBlock($block);
            $block->addItem($item);
        }

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createTeamBlock(array $data): TeamBlock
    {
        $block = new TeamBlock();
        $block->setOverline($data['overline'] ?? null);
        $block->setHeadline($data['headline'] ?? null);

        $position = 0;
        foreach ($data['items'] ?? [] as $itemData) {
            // Each team entry is a TeamMember resource wrapped in a TeamBlockItem.
            $member = new TeamMember();
            $member->setPosition($position);
            $member->setFirstName($itemData['firstName'] ?? null);
            $member->setLastName($itemData['lastName'] ?? null);
            $member->setEmail($itemData['email'] ?? null);
            $member->setPhone($itemData['phone'] ?? null);
            if (!empty($itemData['picture'])) {
                $member->setPicture($this->createImage($itemData['picture']));
            }
            $this->manager->persist($member);

            $item = new TeamBlockItem();
            $item->setPosition($position++);
            $item->setTeamMember($member);
            $item->setTeamBlock($block);
            $block->addItem($item);
        }

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createGalleryBlock(array $data): GalleryBlock
    {
        $block = new GalleryBlock();
        $block->setColor($data['color'] ?? null);
        $block->setHeadline($data['headline'] ?? null);
        $block->setTitleAlignment($data['titleAlignment'] ?? null);
        $block->setLayout($data['layout'] ?? null);
        $block->setItemAlignment($data['itemAlignment'] ?? null);
        $block->setLightBox($data['lightBox'] ?? null);
        $block->setText($data['text'] ?? null);
        $block->setAmountOfColumns($data['amountOfColumns'] ?? null);

        $position = 0;
        foreach ($data['items'] ?? [] as $itemData) {
            $item = new GalleryBlockItem();
            $item->setPosition($position++);
            $item->setTitle($itemData['title'] ?? null);
            $item->setDescription($itemData['description'] ?? null);
            if (isset($itemData['picture'])) {
                $item->setPicture($this->createImage($itemData['picture']));
            }
            $item->setGalleryBlock($block);
            $block->addItem($item);
        }

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createQuoteBlock(array $data): QuoteBlock
    {
        $block = new QuoteBlock();
        $block->setAlignment($data['alignment'] ?? null);
        $block->setText($data['text'] ?? null);
        $block->setAuthor($data['author'] ?? null);

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createFormBlock(array $data): FormBlock
    {
        $block = new FormBlock();
        $block->setOverline($data['overline'] ?? null);
        $block->setHeadline($data['headline'] ?? null);
        $block->setText($data['text'] ?? null);
        $block->setDisclaimerMessage($data['disclaimerMessage'] ?? null);

        return $block;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function createSpacerBlock(array $data): SpacerBlock
    {
        $block = new SpacerBlock();
        $block->setDesktop($data['desktop'] ?? null);
        $block->setTablet($data['tablet'] ?? null);
        $block->setMobile($data['mobile'] ?? null);

        return $block;
    }

    /**
     * Create a media File entity from an image under fixtures/images/.
     */
    private function createImage(string $relativePath): FileInterface
    {
        $file = $this->fileFactory->createFromPath($this->projectDir . '/fixtures/images/' . $relativePath);
        $this->manager->persist($file);

        return $file;
    }
}
