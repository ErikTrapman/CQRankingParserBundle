<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\PCS;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class PCSParserTest extends WebTestCase
{

    public function testResultsParseCorrect()
    {

        $this->markTestSkipped('PCS has updated its layout. Need to refine filter-stmt');

        $uri = 'http://www.procyclingstats.com/race.php?id=116935';

        $crawlerManager = new CrawlerManager(new Crawler());

        $res = array();
        foreach ($crawlerManager->getCrawler($uri)->filter("table#list9 tbody tr")->first() as $result) {
            foreach ($result->getElementsByTagName('td') as $td) {
                $res[] = $td->nodeValue;
            }
        }
        $expected = array(1, 16, 80);
        $this->assertEquals($expected, array($res[0], $res[3], $res[4]));
    }
}