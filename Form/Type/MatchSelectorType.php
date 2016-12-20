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

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Match\MatchParser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatchSelectorType extends AbstractType
{

    /**
     *
     * @var MatchParser
     */
    private $matchParser;

    public function __construct(MatchParser $matchParser)
    {
        $this->matchParser = $matchParser;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $options = array();
        $options['empty_value'] = 'Maak keuze';
        $options['choices'] = array_flip($this->matchParser->getMatches());
        $resolver->setDefaults($options);
    }

    public function getName()
    {
        return 'eriktrapman_cqrankingmatchselector_type';
    }

    public function getBlockPrefix()
    {
        return $this->getName();
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}