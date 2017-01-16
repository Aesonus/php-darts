<?php

namespace Aesonus\Darts;

/**
 * Description of Panel
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Panel implements Contracts\PanelInterface
{
        
    /**
     *
     * @var Contracts\PanelColorInterface
     */
    protected $color;
    
    public function color()
    {
        return $color;
    }

    public function get()
    {
        
    }

    public function set($panel)
    {
        
    }
}
