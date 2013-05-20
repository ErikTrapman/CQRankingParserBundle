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
        $res = $this->parseResultsFromExpression($crawler, 'table.border tr');
        if(!empty($res)){
            return $res;
        }
        $val1 = $this->parseResultsFromExpression($crawler, 'table.bordertop tr');
        $val2 = $this->parseResultsFromExpression($crawler, 'table.bordersides tr');
        $val3 = $this->parseResultsFromExpression($crawler, 'table.borderbottom tr');
        return array_merge($val1, $val2, $val3);
    }
}