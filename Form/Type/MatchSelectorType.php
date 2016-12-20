<?php

/*
 * This file is part of the CQ-ranking parser package.
 *
 * (c) Erik Trapman <veggatron@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ErikTrapman\Bundle\CQRankingParserBundle\Form\Type;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Crawler\CrawlerManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        return ChoiceType::class;
    }
}