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
     * @return string
     */
    public static function dartScoreClass()
    {
        return DartScore::class;
    }
}
