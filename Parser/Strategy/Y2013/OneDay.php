<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

class OneDay extends AbstractStrategy implements ParserStrategyInterface
{

    public function parseResults(Crawler $crawler)
    {
        $values1 = $this->parseResultsFromExpression($crawler, 'table.border tr');
        if (!empty($values1)) {
            return $values1;
        }
        $values1 = $this->parseResultsFromExpression($crawler, 'table.bordertop tr');
        $values2 = $this->parseResultsFromExpression($crawler, 'table.bordersides tr');
        $values3 = $this->parseResultsFromExpression($crawler, 'table.borderbottom tr');
        return array_merge($values1, $values2, $values3);
    }
}