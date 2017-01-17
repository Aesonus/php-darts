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
    protected $score = null;

    /**
     *
     * @var PanelInterface 
     */
    protected $panel;

    public function __construct(PanelInterface $panel, ZoneInterface $zone)
    {
        $this->panel = $panel;
        $this->zone = $zone;
        $this->score();
    }

    public function panel()
    {
        return $this->panel;
    }

    public function score()
    {
        if (!isset($this->score)) {
            $this->score = $this->zone()->modify($this);
        }
        return $this->score;
    }

    public function zone()
    {
        return $this->zone;
    }
}
