<?php
namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy;

use Symfony\Component\DomCrawler\Crawler;

interface ParserStrategyInterface {
    
    public function parseResults(Crawler $crawler);
     
}