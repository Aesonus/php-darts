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
    protected $colorClass = NULL;
    
    public static function colorClass($class = NULL)
    {
        if (isset($class)) {
            //Check class to make sure it implements PanelColorInterface
            if (class_implements($class) === Contracts\PanelColorInterface::class) {
                $this->colorClass = $class;
            } else {
                throw new \InvalidArgumentException('$class must implement '
                    . Contracts\PanelColorInterface::class) . '. ' . $class . ' given.';
            }
        } else {
            return new $this->colorClass();
        }
    }
}
