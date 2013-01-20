<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Form\Type;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatchSelectorType extends AbstractType
{
    
    /**
     *
     * @var \ErikTrapman\Bundle\CQRankingParserBundle\Parser\Match\MatchParser
     */
    private $matchParser;
    
    public function __construct(\ErikTrapman\Bundle\CQRankingParserBundle\Parser\Match\MatchParser $matchParser)
    {
        $this->matchParser = $matchParser;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $options = array();
        $options['empty_value'] = 'Maak keuze';
        $options['choices'] = $this->matchParser->getMatches();
        $resolver->setDefaults($options);
    }

    public function getName()
    {
        return 'eriktrapman_cqrankingmatchselector_type';
    }

    public function getParent()
    {
        return 'choice';
    }
}