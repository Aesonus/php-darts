<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface ZoneInterface
{
    /**
     * Returns a modified dart score
     * @param \Aesonus\Darts\Contracts\DartInterface $dart
     * @return int The dart's score after the modifier
     */
    public function modify(DartInterface $dart);
}
