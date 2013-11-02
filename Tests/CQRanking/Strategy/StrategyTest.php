<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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