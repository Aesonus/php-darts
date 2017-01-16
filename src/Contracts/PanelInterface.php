<?php


namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface PanelInterface
{

    const BULLSEYE = 21;
    

    public function get();

    /**
     * 
     * @param int $panel A panel id 0 thru 21 (see notes)
     * @return $this 
     */
    public function set($panel);
}
