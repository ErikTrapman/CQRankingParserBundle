<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

class GeneralClassification extends AbstractStrategy implements ParserStrategyInterface
{

    public function parseResults(Crawler $crawler)
    {
        $val1 = $this->parseResultsFromExpression($crawler, 'table.bordertop tr');
        $val2 = $this->parseResultsFromExpression($crawler, 'table.bordersides tr');
        return array_merge($val1, $val2);
    }
}