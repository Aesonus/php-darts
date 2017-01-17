<?php

namespace Aesonus\Darts;

/**
 * Description of Color
 *
 * @author cory
 */
class Color implements Contracts\PanelColorInterface
{

    const BLACK = 0;
    const WHITE = 1;
    const RED = 2;
    const GREEN = 3;
    const COLORS = [
        'black' => self::BLACK,
        'white' => self::WHITE,
        'red' => self::RED,
        'green' => self::GREEN
    ];

    /**
     *
     * @var int 
     */
    protected $color;

    public function get()
    {
        return $this->color;
    }

    public function set($color)
    {
        if (in_array($color, self::COLORS)) {
            $this->color = $color;
        } else {
            throw new Exceptions\InvalidColorException();
        }
    }
}
