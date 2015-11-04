<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Exception\CQParserException;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerManager
{

    /**
     * @var Crawler
     */
    private $crawler;

    /**
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @param $url
     * @return Crawler
     */
    public function getCrawler($url)
    {
        $this->crawler->clear();
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
        return $this->getCrawler($url);
    }

    /**
     * @param $content
     * @return Crawler
     */
    public function getCrawlerForHTMLContent($content)
    {
        $this->crawler->addContent($content, 'text/html');
        return $this->crawler;
    }

    /**
     * @param $feed
     * @return string
     */
    private function getContent($feed)
    {
        $content = file_get_contents($feed);
        if ($content === false) {
            throw new CQParserException('Unable to get content from ' . $feed);
        }
        return $content;
    }
}