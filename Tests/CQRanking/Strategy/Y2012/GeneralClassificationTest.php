<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\Y2012;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012\GeneralClassification;

class GeneralClassificationTest extends \ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\StrategyTest
{

    public function testResultsParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=21645';
        $strategy = new GeneralClassification();
        $results = $strategy->parseResults($this->getCrawler($url));

        $this->assertEquals(153, count($results));
        
        $wiggins = $results[0];
        $this->assertEquals(array("1", "990", "600"), array($wiggins['pos'], $wiggins['cqranking_id'], $wiggins['points']));
        // cq-ranking has results in different tables
        $leipheimer = $results[31];
        $this->assertEquals(array("32", "84", "45"), array($leipheimer['pos'], $leipheimer['cqranking_id'], $leipheimer['points']));
        // cq-ranking has results in different tables
        $cherel = $results[61];
        $this->assertEquals(array("62", "3371", "20"), array($cherel['pos'], $cherel['cqranking_id'], $cherel['points']));
        // cq-ranking has results in different tables
        $engoulvent = $results[152];
        $this->assertEquals(array("153", "261", "20"), array($engoulvent['pos'], $engoulvent['cqranking_id'], $engoulvent['points']));
        
    }
}