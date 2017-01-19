<?php

namespace Aesonus\Darts\Contracts;
use Aesonus\Darts\Exceptions\DartNotThrownException;

/**
 *
 * @author cory
 */
interface DartBoardInterface
{
    
    /**
     * 
     * @param PanelInterface $panel
     * @return PanelInterface directly across from the other panel
     */
    public function verticalPanel(PanelInterface $panel);

    /**
     * 
     * @param DartInterface $dart
     * @return mixed The color of the dart
     * @throws DartNotThrownException
     */
    public function getColor(DartInterface $dart);
}
