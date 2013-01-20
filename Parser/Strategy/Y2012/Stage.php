<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

class Stage extends AbstractStrategy implements ParserStrategyInterface
{

    public function parseResults(Crawler $crawler)
    {
        return $this->parseResultsFromExpression($crawler, 'table.bordertop tr');
    }
}