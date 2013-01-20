<?php

namespace ErikTrapman\Bundle\CQRankingParserBundle\Form\DataTransformer;

use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\AbstractStrategy;
use ErikTrapman\Bundle\CQRankingParserBundle\Parser\Strategy\Stage;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class ConstantToStrategyClassTransformer implements DataTransformerInterface
{

    /**
     * 
     * @param \ErikTrapman\Bundle\CQRankingParserBundle\Form\DataTransformer\Renner $value
     * @return string
     */
    public function transform($value)
    {
        if ($value === null) {
            return $value;
        }
        if ($value instanceof AbstractStrategy) {
            return get_class($value);
        }
        return null;
    }

    /**
     * 
     * @param string $value
     * @return string|Stage
     * @throws TransformationFailedException
     */
    public function reverseTransform($value)
    {
        if ($value === null) {
            return null;
        }
        if (!class_exists($value)) {
            throw new TransformationFailedException("Unknown class ".$value);
        }
        $instance = new $value;
        if (!$instance instanceof AbstractStrategy) {
            throw new TransformationFailedException("Invalid class ".$value);
        }
        return $instance;
    }
}
?>
