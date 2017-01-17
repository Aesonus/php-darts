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
     * @var ZoneInterface 
     */
    protected $zone = null;

    /**
     *
     * @var PanelInterface 
     */
    protected $panel = null;

    public function __construct(Contracts\PanelInterface $panel, Contracts\ZoneInterface $zone)
    {
        $this->zone = $zone;
        $this->panel = $panel;
    }

    public function panel()
    {
        $this->isInit();
        return $this->panel;
    }

    public function score()
    {
        $this->isInit();
        return $this->zone()->modify($this);
    }

    public function zone()
    {
        $this->isInit();
        return $this->zone;
    }

    private function isInit()
    {
        if (in_array(NULL, [$this->zone, $this->panel])) {
            throw new Exceptions\DartNotInitializedException;
        }
    }
}
