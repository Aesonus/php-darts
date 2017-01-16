<?php

namespace Aesonus\Darts;

/**
 * Description of Config
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Config implements Contracts\ConfigInterface
{
    /**
     * 
     * @return DartScoreInterface
     */
    public static function newDartScoreObject()
    {
        return new DartScore();
    }
}
