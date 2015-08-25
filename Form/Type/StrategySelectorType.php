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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StrategySelectorType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new \ErikTrapman\Bundle\CQRankingParserBundle\Form\DataTransformer\ConstantToStrategyClassTransformer());
    }
    
    public function getName()
    {
        return 'eriktrapman_cqparser_strategy';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'empty_value' => 'Maak keuze',
            'choices' => array(
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012\OneDay' => 'Eendagskoers 2012',
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012\Stage' => 'Etappe 2012',
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2012\GeneralClassification' => 'Alg. klassement 2012',
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\OneDay' => 'Eendagskoers 2013',
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\Stage' => 'Etappe 2013',
                'ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Y2013\GeneralClassification' => 'Alg. klassement 2013',
                )
            )
        );
    }

    public function getParent()
    {
        return 'choice';
    }
}
?>
