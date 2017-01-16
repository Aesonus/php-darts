<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface DartScoreInterface
{
    /**
     * Gets the score
     * @return int Dart Score 0 thru 60
     */
    public function get();
    
    /**
     * 
     * @param int $score A score, 0 thru 60
     * @return $this For chaining
     */
    public function set($score);
}
