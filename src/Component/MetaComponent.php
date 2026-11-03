<?php

namespace App\Component;

use Enhavo\Bundle\MediaBundle\Model\FileInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(name: 'meta', template: 'theme/component/meta.html.twig')]
class MetaComponent
{

    public ?object $resource;

    public ?string $page_title;

    public ?string $meta_description;

    public ?string $meta_robots;

    public ?string $og_title;

    public ?string $og_description;

    public ?FileInterface $og_image;

    public ?string $og_url;

    public ?string $canonical;

    public function __construct(
        private RequestStack $requestStack,
        private string $brandName,
    ) {
    }

    #[PreMount]
    public function preMount(array $data): array
    {
        $optionsResolver = new OptionsResolver();
        $optionsResolver->setDefaults([
            'template' => 'theme/widget/meta.html.twig',
            'brand_name' => $this->brandName,
            'page_title' => null,
            'robots' => null,
            'set_canonical' => true,
            'connector' => ' - ',
        ]);
        $optionsResolver->setRequired('resource');

        $this->createViewData($optionsResolver->resolve($data));

        return [];
    }

    public function createViewData(array $options): void
    {
        $resource = $options['resource'];
        $brandName = $this->getOption('brand_name', $options);
        $connector = $this->getOption('connector', $options);
        $pageTitle = null;
        $metaDescription = null;
        $ogTitle = null;
        $ogDescription = null;
        $metaRobots = $this->getOption('robots', $options, 'follow, index');
        $ogImage = null;
        $ogUrl = null;
        $canonical = $this->getOption('set_canonical', $options);

        // NOTE: The Content / Routeable / Page-specific branches were removed during the
        // Enhavo 0.14 -> 0.15.14 migration. RoutingBundle, ContentBundle and PageBundle are
        // no longer installed and there is no replacement Page/Content entity or object-router
        // yet. Only the generic, scalar-option-based metadata behavior is kept here until the
        // 0.15.14 content model is designed.
        $pageTitle = $this->createPageTitle($this->getOption('page_title', $options), $brandName, $connector);

        if ($canonical !== false) {
            $canonicalUrl = parse_url($canonical);
            $request = $this->requestStack->getMainRequest();
            $host = $request->getSchemeAndHttpHost();
            $path = strlen($canonicalUrl['path']) ? $canonicalUrl['path'] : $request->getPathInfo();
            $canonical = sprintf('%s%s', $host, $path);
        }

        $this->resource = $resource;
        $this->page_title = $pageTitle ?? $brandName;
        $this->meta_description = $metaDescription;
        $this->meta_robots = $metaRobots;
        $this->og_title = $ogTitle;
        $this->og_description = $ogDescription;
        $this->og_image = $ogImage;
        $this->og_url = $ogUrl;
        $this->canonical = $canonical;
    }

    /**
     * @param string|null $pagetitle
     * @param string|null $brandName
     * @param string $connector
     * @return string|null
     */
    private function createPageTitle(?string $pagetitle, ?string $brandName, string $connector): ?string
    {
        if ($pagetitle && $brandName) {
            if (str_ends_with($pagetitle, $brandName)) {
                return $pagetitle;
            }
            return strip_tags(sprintf('%s %s %s', $pagetitle, $connector, $brandName));
        }

        return strip_tags($pagetitle);
    }

    protected function getOption($key, $options, $default = null)
    {
        if(array_key_exists($key, $options)) {
            return $options[$key];
        }
        return $default;
    }

}
