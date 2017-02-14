<?php

namespace Aesonus\Darts;

/**
 * Description of Color
 *
 * @author cory
 */
class Color implements Contracts\ColorInterface
{

    const BLACK = 'black';
    const WHITE = 'white';
    const RED = 'red';
    const GREEN = 'green';
    const COLORS = [
        self::BLACK,
        self::WHITE,
        self::RED,
        self::GREEN
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
        if (in_array($color, static::COLORS) || $color == null) {
            $this->color = $color;
        } else {
            throw new Exceptions\InvalidColorException();
        }
        return $this;
    }
}
