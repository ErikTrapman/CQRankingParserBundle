<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Exception\CQParserException;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;
use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractStrategy implements ParserStrategyInterface
{

    public function __construct()
    {
        
    }

    /**
     * 
     * @param Crawler $crawler
     * @param type $url
     * @param type $expr
     * @return type
     * @throws CQParserException
     */
    protected function parseResultsFromExpression(Crawler $crawler, $expr)
    {
        $resultrows = $crawler->filter($expr)->filter('td');
        $returnValues = array();
        $trIndex = 0;
        $tdIndex = 0;
        foreach ($resultrows as $currentResult) {
            if ($tdIndex == 1) {
                $returnValues[$trIndex]['pos'] = trim($currentResult->nodeValue, '.');
            }
            if($tdIndex == 3){
                $img = $currentResult->getElementsByTagName("img");
                $gif = $img->item(0)->getAttribute('src');
                $parts = explode(".",basename($gif));
                $returnValues[$trIndex]['nat'] = $parts[0];
                
            }
            if ($tdIndex == 5) {
                $returnValues[$trIndex]['name'] = $currentResult->nodeValue;
                $hyperlink = $currentResult->getElementsByTagName('a');
                $riderHref = $hyperlink->item(0)->getAttribute('href');

                $riderId = substr($riderHref, strpos($riderHref, '=') + 1);
                $returnValues[$trIndex]['cqranking_id'] = $riderId;
            }
            if ($tdIndex == 11) {
                $returnValues[$trIndex]['points'] = $currentResult->nodeValue;
            }
            $tdIndex++;
            if ($tdIndex == 13) {
                $tdIndex = 0;
                $trIndex++;
            }
        }
        return $returnValues;
    }
}