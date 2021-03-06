<?php


namespace Aesonus\Darts\Contracts;

/**
 *
 * @author cory
 */
interface PanelInterface
{

    const BULLSEYE = 21;
    const MISS = 0;
    
    /**
     * 
     * @return int 
     */
    public function get();

    /**
     * 
     * @param int $panel A panel id 0 thru 21 (see notes)
     * @throws \InvalidArgumentException
     * @return $this 
     */
    public function set($panel);
}
