<?php


namespace App\Twig;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Twig\Extension\AbstractExtension;

class GeneralFunctions extends AbstractExtension {

    use ContainerAwareTrait;

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('youtube_url', array($this, 'getYoutubeUrl')),
            new \Twig_SimpleFilter('youtube_id', array($this, 'getYoutubeId'))
        );
    }

    public function getYoutubeId($data)
    {
        $code = $this->getYoutubeCode($data);
        return $code;
    }

    public function getYoutubeUrl($data)
    {
        $code = $this->getYoutubeCode($data);
        if($code === null) {
            return '';
        }
        $params = "?modestbranding=1&autoplay=1&showinfo=0&rel=0";
        if (strpos($data, 'www.youtube-nocookie.com') > -1) {
            return sprintf('https://www.youtube-nocookie.com/embed/%s'.$params, $code);
        }
        return sprintf('https://www.youtube.com/embed/%s'.$params, $code);
    }

    protected function getYoutubeCode($data)
    {
        $url = parse_url($data);
        if($url === false) {
            return null;
        }
        if(isset($url['query'])) {
            $queries = [];
            parse_str($url['query'], $queries);
            if(isset($queries['v'])) {
                return $queries['v'];
            }
        }
        if(isset($url['path'])) {
            $matches = [];
            if(preg_match('#embed/([a-zA-z0-9-_]*)#', $url['path'], $matches)) {
                if(count($matches)) {
                    return $matches[1];
                }
            }
        }
        return null;
    }
}