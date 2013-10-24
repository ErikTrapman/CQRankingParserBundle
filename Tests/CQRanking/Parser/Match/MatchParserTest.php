<?php
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