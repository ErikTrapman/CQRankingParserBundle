<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Match;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;

class MatchParser
{
    private $crawlerManager;

    private $matchesFeed;

    public function __construct(CrawlerManager $crawlermanager, $matchesFeed)
    {
        $this->crawlerManager = $crawlermanager;
        $this->matchesFeed = $matchesFeed;
    }

    /**
     * 
     */
    public function getMatches()
    {
        $ret = array();
        $crawler = $this->crawlerManager->getCrawlerForMatchSelector($this->matchesFeed);
        $results = $crawler->filterXPath('//item');
        foreach ($results as $result) {
            $link = $result->getElementsByTagName('link');
            if (!$link->length) {
                continue;
            }
            $titleItem = $result->getElementsByTagName('title');
            $title = ( $titleItem->length ) ? $titleItem->item(0)->nodeValue : 'Onbekend';
            $dateItem = $result->getElementsByTagName('pubDate');
            $date = ( $dateItem->length ) ? $dateItem->item(0)->nodeValue : '';
            $ret[$link->item(0)->nodeValue] = sprintf("%s [%s]",$title,$date);
        }
        return $ret;
    }
}