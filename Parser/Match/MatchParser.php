<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Match;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;

class MatchParser
{
    private $crawlerManager;

    private $matchesFeed;

    /**
     * @param CrawlerManager $crawlermanager
     * @param $matchesFeed
     */
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
        // TODO refactor this to make it more testeable. e,g, the possibility to feed it with static content.
        $crawler = $this->crawlerManager->getCrawlerForMatchSelector($this->matchesFeed);

        $crawler->filter('table.border tr')->each(function ($node, $i) use (&$ret) {
            $date = $cat = $a = $name = null;
            if (0 === $i) {
                return;
            }
            foreach ($node->filter('td') as $index => $td) {
                if (1 === $index) {
                    $date = $td->nodeValue;
                }
                if (3 === $index) {
                    $cat = $td->nodeValue;
                }
                if (7 === $index) {
                    $aEl = $td->getElementsByTagName('a')->item(0);
                    $a = 'http://cqranking.com/men/asp/gen/' . $aEl->getAttribute('href');
                    $name = $aEl->nodeValue;
                }
            }
            $ret[$a] = sprintf('[%s] %s - %s', $date, $cat, $name);

        });
        return $ret;
    }
}