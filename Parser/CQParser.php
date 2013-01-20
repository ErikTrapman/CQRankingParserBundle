<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Parser;

use Symfony\Component\DomCrawler\Crawler;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Exception\CQParserException;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\ParserStrategyInterface;

class CQParser
{
    /**
     * 
     * @var Symfony\Component\DomCrawler\Crawler
     */
    private $crawler;

    /**
     * Url
     * @var unknown_type
     */
    private $url;

    /**
     *
     * Enter description here ...
     */
    public function __construct()
    {
        
    }

    /**
     * Naam van de uitslag.
     *  
     */
    public function getName(Crawler $crawler)
    {
        $headers = $crawler->filter('table.borderNoOpac th.raceheader b');
        $values = $headers->extract(array('_text', 'b'));
        $name = @$values[0][0];
        if ($name === false) {
            return 'Naam kon niet worden opgehaald. Vul zelf in via '.$this->url;
        }
        return trim($name);
    }

    /**
     * Parse de resultaatregels
     * @param string $parsingStrategyClassname
     * @return array
     */
    public function getResultRows(Crawler $crawler, $strategyClassname)
    {
        return $strategyClassname->parseResults($crawler);
    }
}