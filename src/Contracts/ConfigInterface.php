<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
interface ConfigInterface
{
    /**
     * 
     * @return DartScoreInterface
     */
    public static function newDartScoreObject();
}
