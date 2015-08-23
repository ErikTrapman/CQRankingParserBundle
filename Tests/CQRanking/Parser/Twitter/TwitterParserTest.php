<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Parser\Twitter;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TwitterParserTest extends WebTestCase
{

    /**
     * @dataProvider twitterDataProvider
     */
    public function testTwitterHandleParser($cqId, $exp)
    {
        $client = static::createClient();
        $parser = $client->getContainer()->get('eriktrapman_cqparser.twitterparser');
        $this->assertEquals($exp, $parser->getTwitterHandle($cqId));
    }

    public function twitterDataProvider()
    {
        return [
            [16941, 'estecharu'],
            [27, null]
        ];
    }

}