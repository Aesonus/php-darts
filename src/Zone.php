<?php

namespace Aesonus\Darts;

/**
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Zone implements Contracts\ZoneInterface
{
    const MISS = 'miss';
    const DOUBLE = 'double';
    const TRIPLE = 'triple';
    const OUTER_SINGLE = 'outerSingle';
    const INNER_SINGLE = 'innerSingle';
    const OUTER_BULLSEYE = 'outerBullseye';
    const INNER_BULLSEYE = 'innerBullseye';

    /**
     * Callable for the modification method
     * @var string
     */
    protected $zone;
    
    public function __construct()
    {
        
    } 

    public function get()
    {
        return $this->zone;
    }

    public function modify(Contracts\DartInterface $dart)
    {
        $modify = [$this, $this->zone];
        return $modify($dart);
    }

    public function set($zone)
    {
        if (!in_array($zone, Contracts\ZoneInterface::ZONES, true)) {
            throw new Exceptions\InvalidZoneException;
        } else {
            $this->zone = $zone;
        }
        return $this;
    }

    public function miss(Contracts\DartInterface $dart)
    {
        return 0;
    }
    
    public function double(Contracts\DartInterface $dart)
    {
        return $dart->panel()->get() * 2;
    }

    public function outerSingle(Contracts\DartInterface $dart)
    {
        return $dart->panel()->get();
    }

    public function triple(Contracts\DartInterface $dart)
    {
        return $dart->panel()->get() * 3;
    }

    public function innerSingle(Contracts\DartInterface $dart)
    {
        return $dart->panel()->get();
    }

    public function outerBullseye(Contracts\DartInterface $dart)
    {
        return 25;
    }

    public function innerBullseye(Contracts\DartInterface $dart)
    {
        return 50;
    }
}
