<?php

namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface DartBoardInterface
{
    /**
     * The panel directly across from another
     * @var array The panel directly across from another. Misses and bullseyes do not have a vertical panel
     */
    const VERTICAL_PANEL = 
        [null, 19, 12, 20, 16, 17, 11, 18, 13, 15, 14, 6, 2, 8, 10, 9, 4, 5, 7, 1, 3, null];
    
    /**
     * 
     * @param \Aesonus\Darts\Contracts\PanelInterface $panel
     * @return PanelInterface directly across from the other panel
     */
    public static function verticalPanel(PanelInterface $panel);
    
    /**
     * Returns the color of $panel in $zone
     * @param \Aesonus\Darts\Contracts\PanelInterface $panel
     * @param \Aesonus\Darts\Contracts\ZoneInterface $zone
     * @return int Number representing a color
     */
    public static function getColor(PanelInterface $panel, ZoneInterface $zone);
}
