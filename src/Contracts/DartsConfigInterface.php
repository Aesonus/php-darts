<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
interface DartsConfigInterface
{
    /**
     * Sets or creates new instance of the class used to represent a panel's color
     * @param string $class
     * @throws \InvalidArgumentException
     * @return PanelColorInterface
     */
    public static function colorClass($class = NULL);
}
