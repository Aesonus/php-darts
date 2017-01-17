<?php

namespace Aesonus\Darts\Zones;

/**
 * Description of Single
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
abstract class Single implements \Aesonus\Darts\Contracts\ZoneInterface
{
    public function modify(\Aesonus\Darts\Contracts\DartInterface $dart)
    {
        return $dart->panel()->get();
    }
}
