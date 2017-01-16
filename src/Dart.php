<?php

namespace Aesonus\Darts;

/**
 * Description of Dart
 *
 * @author Aesonus
 */
class Dart implements Contracts\DartInterface
{
    /**
     *
     * @var Contracts\ZoneInterface 
     */
    protected $zone;
    
    /**
     *
     * @var Contracts\ScoreInterface 
     */
    protected $score;
    
    /**
     *
     * @var Contracts\PanelInterface 
     */
    protected $panel;

    public function __construct()
    {
        
    }

    public function panel()
    {
        
    }

    public function score()
    {
        
    }

    public function zone()
    {
        
    }
}
