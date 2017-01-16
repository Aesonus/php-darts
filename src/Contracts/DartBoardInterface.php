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
     */
    const VERTICAL_PANEL = 
        [19, 12, 20, 16, 17, 11, 18, 13, 15, 14, 6, 2, 8, 10, 9, 4, 5, 7, 1, 3, null];
    
    /**
     * 
     * @param \Aesonus\Darts\Contracts\PanelInterface $panel
     * @return PanelInterface directly across from the other panel
     */
    public function verticalPanel(PanelInterface $panel);
    
    public function getColor(PanelInterface $panel, ZoneInterface $zone);
}
