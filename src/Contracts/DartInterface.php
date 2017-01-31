<?php

namespace Aesonus\Darts\Contracts;
use Aesonus\Darts\Exceptions\DartNotThrownException;
use Aesonus\Darts\Exceptions\InvalidColorException;

/**
 * Represents a dart
 *
 * @author cory
 */
interface DartInterface
{

    /**
     * 
     * @throws DartNotThrownException
     * @return int 
     */
    public function score();

    /**
     * 
     * @throws DartNotThrownException
     * @return PanelInterface 
     */
    public function panel();

    /**
     * 
     * @throws DartNotThrownException
     * @return ZoneInterface 
     */
    public function zone();
    
    /**
     * 
     * @return ColorInterface
     * @throws InvalidColorException
     */
    public function color();
    
    /**
     * Sets the panel and zone
     * @param type $panel must allow null
     * @param type $zone must allow null
     * @return $this 
     * @throws \InvalidArgumentException
     */
    public function set($panel, $zone = null);
    
    /**
     * 
     * @return bool Whether the dart has missed or not
     * @throws DartNotThrownException
     */
    public function missed();
    
    /**
     * 
     * @return bool Returns if the dart has been thrown
     * @throws DartNotThrownException
     */
    public function isThrown();
}
