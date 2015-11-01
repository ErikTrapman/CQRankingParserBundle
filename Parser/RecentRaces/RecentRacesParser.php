<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\RecentRaces;

use ErikTrapman\Bundle\CQRankingParserBundle\DataContainer\RecentRaceDataContainer;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Exception\CQParserException;

class RecentRacesParser
{
    /**
     * @var CrawlerManager
     */
    private $crawlerManager;

    /**
     * @param CrawlerManager $crawlermanager
     * @param $matchesFeed
     */
    public function __construct(CrawlerManager $crawlermanager)
    {
        $this->crawlerManager = $crawlermanager;
    }

    /**
     * @param null $content
     * @return RecentRaceDataContainer[]
     */
    public function getRecentRaces($content = null)
    {
        if (null === $content) {
            $content = @file_get_contents('http://cqranking.com/men/asp/gen/RacesRecent.asp?changed=0');
            if (false === $content) {
                throw new CQParserException('Unable to fetch content for RecentRaces on http://cqranking.com/men/asp/gen/RacesRecent.asp?changed=0');
            }
        }
        $ret = [];
        $crawler = $this->crawlerManager->getCrawlerForHTMLContent($content);
        $crawler->filter('table.border tr')->each(function ($node, $i) use (&$ret) {
            if (0 === $i) {
                return;
            }
            $row = new RecentRaceDataContainer();
            foreach ($node->filter('td') as $index => $td) {
                if (0 == $index) {
                    continue;
                }
                if (1 == $index) {
                    $row->date = \DateTime::createFromFormat('d/m', $td->nodeValue);
                }
                if (3 == $index) {
                    $row->category = $td->nodeValue;
                }
                if (7 === $index) {
                    $row->name = utf8_encode($td->nodeValue);
                    $aEl = $td->getElementsByTagName('a')->item(0);
                    //$a = 'http://cqranking.com/men/asp/gen/' . ;
                    $row->url = $aEl->getAttribute('href');
                }
            }
            $ret[] = $row;
        });
        return $ret;
    }
}