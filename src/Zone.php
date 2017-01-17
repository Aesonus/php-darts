<?php

namespace Aesonus\Darts;

/**
 * Description of SingleInner
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Zone implements Contracts\ZoneInterface
{


    /**
     * Callable for the modification method
     * @var string
     */
    protected $zone;

    public function get()
    {
        return $this->zone;
    }

    public function modify(Contracts\DartInterface $dart)
    {
        return $this->zone($dart);
    }

    public function set($zone)
    {
        
    }

    public function miss(Contracts\DartInterface $dart)
    {
        return 0;
    }

    public function double(Contracts\DartInterface $dart)
    {
        return $panel->get() * 2;
    }

    public function outerSingle(Contracts\DartInterface $dart)
    {
        return $panel->get();
    }

    public function triple(Contracts\DartInterface $dart)
    {
        return $panel->get() * 3;
    }

    public function innerSingle(Contracts\DartInterface $dart)
    {
        return $panel->get();
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
