<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\Y2013;

class OneDayTest extends \ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\StrategyTest
{
    
    public function testResultsParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=23598';
        $strategy = new \ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\OneDay();
        $results = $strategy->parseResults($this->getCrawler($url));

        $this->assertEquals(115, count($results));
        
        $first = $results[0];
        $this->assertEquals(array(1, 73, 280), array($first['pos'], $first['cqranking_id'], $first['points']));
        // cq-ranking has results in different tables
        $break1 = $results[31];
        $this->assertEquals(array(32, 3152, 5), array($break1['pos'], $break1['cqranking_id'], $break1['points']));
        // cq-ranking has results in different tables
        $break2 = $results[61];
        $this->assertEquals(array(62, 1071, 5), array($break2['pos'], $break2['cqranking_id'], $break2['points']));
        // cq-ranking has results in different tables
        $last = $results[114];
        $this->assertEquals(array(115, 7731, 5), array($last['pos'], $last['cqranking_id'], $last['points']));
        
    }
    
}