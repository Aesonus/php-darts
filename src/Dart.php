<?php

namespace Aesonus\Darts;

use Aesonus\Darts\Contracts\DartInterface;
use Aesonus\Darts\Contracts\PanelInterface;
use Aesonus\Darts\Contracts\ZoneInterface;

/**
 * Description of Dart
 *
 * @author Aesonus
 */
class Dart implements DartInterface
{

    /**
     *
     * @var Contracts\ZoneInterface 
     */
    protected $zone;

    /**
     *
     * @var int 
     */
    protected $score;

    /**
     *
     * @var PanelInterface 
     */
    protected $panel;

    public function __construct(PanelInterface $panel, ZoneInterface $zone)
    {
        $this->panel = $panel;
        $this->zone = $zone;
    }

    public function panel()
    {
        return $this->panel;
    }

    public function score()
    {
        return $this->score;
    }

    public function zone()
    {
        return $this->zone;
    }
}
