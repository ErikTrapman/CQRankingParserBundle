<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

class Stage extends AbstractStrategy implements ParserStrategyInterface
{

    public function parseResults(Crawler $crawler)
    {
        $res = $this->parseResultsFromExpression($crawler, 'table.border tr');
        if (!empty($res)) {
            return $res;
        }
        return $this->parseResultsFromExpression($crawler, 'table.bordertop tr');
    }
}