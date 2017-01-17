<?php

namespace Aesonus\Darts;

/**
 * Description of Config
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Config implements Contracts\DartsConfigInterface
{

    /**
     *
     * @var string
     */
    protected static $colorClass;

    public static function colorClass($class = NULL)
    {
        if (isset($class)) {
            //Check class to make sure it implements PanelColorInterface
            if (in_array(Contracts\PanelColorInterface::class, class_implements($class))) {
                static::$colorClass = $class;
            } else {
                throw new \InvalidArgumentException('$class must implement '
                . Contracts\PanelColorInterface::class . '. ' . $class . ' given.');
            }
        } else {
            return new static::$colorClass();
        }
    }
}
