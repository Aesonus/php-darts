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
    
    /**
     * A number to represent the panel
     * @var int 
     */
    protected $panel = 0;
    
    public function __construct($panel)
    {
        $this->set($panel);
    }
    
    public function color()
    {
        if (!isset($this->color)) {
            $this->color = Config::colorClass();
        }
        return $this->color;
    }

    public function get()
    {
        return $this->panel;
    }

    public function set($panel)
    {
        if (is_int($panel) && $panel >= 0 && $panel <= static::BULLSEYE) {
            $this->panel = $panel;
        } else {
            throw new \InvalidArgumentException('$panel must be an integer 0 - '
                . static::BULLSEYE . '. ' . $panel . ' given.');
        }
        return $this;
    }
}
