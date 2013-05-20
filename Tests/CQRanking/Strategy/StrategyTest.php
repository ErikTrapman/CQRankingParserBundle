<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Tests\CQRanking\Strategy;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;
use Symfony\Component\DomCrawler\Crawler;

abstract class StrategyTest extends WebTestCase
{

    public function getCrawler($url)
    {
        $manager = new CrawlerManager(new Crawler());
        return $manager->getCrawler($url);
    }
}