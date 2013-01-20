<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

class GeneralClassification extends AbstractStrategy implements ParserStrategyInterface
{

    public function parseResults(Crawler $crawler)
    {
        // It's january 2013 now, so only some GC's from a 2.2...
        // not sure if GC's from 2.1 or higher will have the same HTML structure
        return $this->parseResultsFromExpression($crawler, 'table.border tr');
    }
}