<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Parser\RecentRaces;


use ErikTrapman\Bundle\CQRankingParserBundle\Parser\RecentRaces\RecentRacesParser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecentRacesParserTest extends WebTestCase
{

    public function testRecentRacesParsesCorrect()
    {
        $client = static::createClient();
        $parser = $client->getContainer()->get('eriktrapman_cqparser.recentracesparser');

        $content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'recentraces-20151029.html');
        $ret = $parser->getRecentRaces($content);

        $this->assertCount(100, $ret);

        $this->assertEquals('23-09', $ret[0]->date->format('d-m'));
        $this->assertEquals('1.1', $ret[0]->category);
        $this->assertEquals('Omloop van het Houtland - Lichtervelde', $ret[0]->name);
        $this->assertEquals('race.asp?raceid=28327', $ret[0]->url);

        $this->assertEquals('28-10', $ret[99]->date->format('d-m'));
        $this->assertEquals('2.HC', $ret[99]->category);
        $this->assertEquals('Tour of Hainan, General classification', $ret[99]->name);
        $this->assertEquals('race.asp?raceid=28518', $ret[99]->url);
    }


}