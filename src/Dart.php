<?php

namespace Aesonus\Darts;

use Aesonus\Darts\Contracts;

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
     * @var ScoreInterface 
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
        //Needs a score interface
        $this->score = Config::newDartScoreObject();
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
