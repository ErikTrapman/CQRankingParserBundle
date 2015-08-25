<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy;

use Symfony\Component\DomCrawler\Crawler;

interface ParserStrategyInterface {
    
    public function parseResults(Crawler $crawler);
     
}