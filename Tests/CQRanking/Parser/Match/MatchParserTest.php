<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Parser\Match;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatchParserTest extends WebTestCase
{

    public function testMatchParser()
    {
        $client = static::createClient();
        $matchParser = $client->getContainer()->get('eriktrapman_cqparser.matchparser');
        $res = $matchParser->getMatches();
        $this->assertEquals(true, !empty($res));

    }

}