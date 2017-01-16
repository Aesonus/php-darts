<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface PanelColorInterface
{
    /**
     * Gets the color
     * @return int
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
