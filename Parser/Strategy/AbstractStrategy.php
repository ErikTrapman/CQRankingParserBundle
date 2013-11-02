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
        $data = $crawler->filter($expr)->filter('tr')->each(function($node, $i) {
                $returnValues = array();
                foreach ($node->filter('td') as $key => $currentResult) {
                    if ($key == 1) {
                        $pos = trim($currentResult->nodeValue, '.');
                        if (0 !== strcmp('leader', $pos) && !is_numeric($pos)) {
                            break;
                        }
                        $returnValues['pos'] = $pos;
                    }
                    if ($key == 3) {
                        $img = $currentResult->getElementsByTagName("img");
                        if ($img->length) {
                            $gif = $img->item(0)->getAttribute('src');
                            $parts = explode(".", basename($gif));
                            $returnValues['nat'] = $parts[0];
                        } else {
                            $returnValues['nat'] = null;
                        }
                    }
                    if ($key == 5) {
                        $returnValues['name'] = $currentResult->nodeValue;
                        $hyperlink = $currentResult->getElementsByTagName('a');
                        $riderHref = $hyperlink->item(0)->getAttribute('href');

                        $riderId = substr($riderHref, strpos($riderHref, '=') + 1);
                        $returnValues['cqranking_id'] = $riderId;
                    }
                    if ($key == 11) {
                        $returnValues['points'] = $currentResult->nodeValue;
                    }
                }
                return $returnValues;
            });
            //array_values to generate new keys, starting from 0
        return array_values(array_filter($data, create_function('$a', 'return !empty($a);')));
    }
}