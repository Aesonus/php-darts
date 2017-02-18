<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface ColorInterface
{
    /**
     * Gets the color
     * @return string
     */
    public function get();
    
    /**
     * 
     * @param int $color Colors should be represented with ints
     * @throws Exceptions\InvalidColorException
     * @return $this 
     */
    public function set($color);
}
