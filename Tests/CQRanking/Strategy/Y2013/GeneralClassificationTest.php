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

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\GeneralClassification;

class GeneralClassificationTest extends \ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\StrategyTest
{

    public function testResultsParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=24430';
        $strategy = new GeneralClassification();
        $results = $strategy->parseResults($this->getCrawler($url));

        $this->assertEquals(111, count($results));
        
        $first = $results[0];
        $this->assertEquals(array(1, 7225, 160), array($first['pos'], $first['cqranking_id'], $first['points']));
        // cq-ranking has results in different tables
        $break1 = $results[31];
        $this->assertEquals(array(32, 18, 5), array($break1['pos'], $break1['cqranking_id'], $break1['points']));
        // cq-ranking has results in different tables
        $break2 = $results[61];
        $this->assertEquals(array(62, 5056, 0), array($break2['pos'], $break2['cqranking_id'], $break2['points']));
        // cq-ranking has results in different tables
        $last = $results[110];
        $this->assertEquals(array(111, 12282, 0), array($last['pos'], $last['cqranking_id'], $last['points']));
    }
}