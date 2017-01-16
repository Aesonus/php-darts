<?php

namespace Aesonus\Darts;

/**
 * Description of DartScore
 *
 * @author cory
 */
class DartScore implements Contracts\DartScoreInterface
{
    /**
     *
     * @var int 
     */
    protected $score;
    
    public function get()
    {
        return $this->score;
    }

    public function set($score)
    {
        if (is_int($score) && $score > -1 && $score < 61) {
            $this->score = $score;
        } else {
            throw new \InvalidArgumentException('$score must be an integer 0 thru 60');
        }
        return $this;
    }
}
