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
        $siteContent = file_get_contents($url);
        if ($siteContent === false) {
            throw new CQParserException('Unable to get content from ' . $url);
        }
        $this->crawler->addContent($siteContent, 'text/html');
        return $this->crawler;
    }
}