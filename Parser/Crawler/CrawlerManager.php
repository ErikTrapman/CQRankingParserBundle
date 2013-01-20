<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Exception\CQParserException;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerManager
{
    private $crawler;

    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    public function getCrawler($url)
    {
        $this->crawler->addContent($this->getContent($url), 'text/html');
        return $this->crawler;
    }

    /**
     * 
     * @param type $url
     * @return Crawler Description
     */
    public function getCrawlerForMatchSelector($url)
    {
        $this->crawler->addXmlContent($this->getContent($url));
        return $this->crawler;
    }

    private function getContent($feed)
    {
        $content = file_get_contents($feed);
        if ($content === false) {
            throw new CQParserException('Unable to get content from '.$feed);
        }
        return $content;
    }
}