<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface DartColorInterface
{
    /**
     * Gets the color
     * @return int
     */
    public function get();
    
    /**
     * 
     * @param type $color
     * @throws Exceptions\InvalidColorException
     * @return $this 
     */
    public function set($color);
}
