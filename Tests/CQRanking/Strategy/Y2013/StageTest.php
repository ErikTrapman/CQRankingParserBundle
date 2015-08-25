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

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\Stage;
use ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy\StrategyTest;

class StageTest extends StrategyTest
{

    public function testResultsFromGTParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=24019';
        $strategy = new Stage();
        $results = $strategy->parseResults($this->getCrawler($url));

        $this->assertEquals(179, count($results));

        $leader = $results[0];
        $this->assertEquals(array('leader', 1994, 18), array($leader['pos'], $leader['cqranking_id'], $leader['points']));
        $first = $results[1];
        $this->assertEquals(array(1, 1992, 70), array($first['pos'], $first['cqranking_id'], $first['points']));
        $last = $results[178];
        $this->assertEquals(array(178, 13228, 0), array($last['pos'], $last['cqranking_id'], $last['points']));
    }

    public function testResultsFrom2HCParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=24197';
        $strategy = new Stage();
        $results = $strategy->parseResults($this->getCrawler($url));
        $this->assertEquals(21, count($results));
        
        $leader = $results[0];
        $this->assertEquals(array('leader', 12335, 8), array($leader['pos'], $leader['cqranking_id'], $leader['points']));
        $first = $results[1];
        $this->assertEquals(array(1, 12335, 25), array($first['pos'], $first['cqranking_id'], $first['points']));
        $last = $results[20];
        $this->assertEquals(array(20, 8768, 0), array($last['pos'], $last['cqranking_id'], $last['points']));
    }
    
    public function testResultsFrom21ParseCorrect()
    {
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=24460';
        $strategy = new Stage();
        $results = $strategy->parseResults($this->getCrawler($url));
        $this->assertEquals(21, count($results));
        
        $leader = $results[0];
        $this->assertEquals(array('leader', 1058, 6), array($leader['pos'], $leader['cqranking_id'], $leader['points']));
        $first = $results[1];
        $this->assertEquals(array(1, 1058, 20), array($first['pos'], $first['cqranking_id'], $first['points']));
        $last = $results[20];
        $this->assertEquals(array(20, 9828, 0), array($last['pos'], $last['cqranking_id'], $last['points']));
    }
    
    public function testResultsFromWTParseCorrect(){
        $url = 'http://cqranking.com/men/asp/gen/race.asp?raceid=23853';
        $strategy = new Stage();
        $results = $strategy->parseResults($this->getCrawler($url));
        $this->assertEquals(133, count($results));
        
        $leader = $results[0];
        $this->assertEquals(array('leader', 2086, 9), array($leader['pos'], $leader['cqranking_id'], $leader['points']));
        $first = $results[1];
        $this->assertEquals(array(1, 2086, 35), array($first['pos'], $first['cqranking_id'], $first['points']));
        $last = $results[132];
        $this->assertEquals(array(132, 18238, 0), array($last['pos'], $last['cqranking_id'], $last['points']));
    }
}