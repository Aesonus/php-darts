<?php

namespace Aesonus\Darts\Zones;

/**
 * Doubles the dart score
 *
 * @author cory
 */
class Double implements \Aesonus\Darts\Contracts\ZoneInterface
{
    public function modify(\Aesonus\Darts\Contracts\DartInterface $dart)
    {
        return $dart->panel()->get() * 2;
    }
}
