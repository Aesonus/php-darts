<?php

namespace Aesonus\Darts;

use Aesonus\Darts\Contracts\DartInterface;
use Aesonus\Darts\Contracts\PanelInterface;
use Aesonus\Darts\Contracts\ZoneInterface;
use Aesonus\Darts\Exceptions\DartNotThrownException;

/**
 * Represents a dart
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

    /**
     *
     * @var Contracts\ColorInterface 
     */
    protected $color = null;

    /**
     *
     * @var Contracts\DartBoardInterface 
     */
    protected $dartBoard = null;

    public function __construct(Contracts\PanelInterface $panel, Contracts\ZoneInterface $zone, Contracts\ColorInterface $color, Contracts\DartBoardInterface $dartBoard)
    {
        $this->zone = $zone;
        $this->panel = $panel;
        $this->color = $color;
        $this->dartBoard = $dartBoard;
    }

    public function panel()
    {
        return $this->panel;
    }

    public function score()
    {
        $this->isThrown();
        return $this->zone()->modify($this);
    }

    public function zone()
    {
        return $this->zone;
    }

    public function color()
    {
        $this->isThrown();
        $this->refresh();
        return $this->color;
    }

    public function set($panel, $zone = null)
    {
        if (isset($panel)) {
            $this->panel->set($panel);
        }
        if (isset($zone)) {
            $this->zone->set($zone);
        }
        return $this;
    }

    public function missed()
    {
        $this->isThrown();
        return $this->panel()->get() === 0 || $this->zone()->get() === Zone::MISS;
    }

    public function isThrown()
    {
        if (in_array(NULL, [$this->zone->get(), $this->panel->get()], true)) {
            throw new Exceptions\DartNotThrownException;
        } else {
            return true;
        }
    }

    /**
     * Sets the color of the dart if it isn't set
     * @return void 
     */
    private function refresh()
    {
        try {
            if ($this->color->get() === null) {
                $this->color->set($this->dartBoard->getColor($this));
            }
        } catch (DartNotThrownException $e) {
            // Do nothing, we just don't want this particular method to throw
            // anything as it is basically a conditional
        }
    }
}
