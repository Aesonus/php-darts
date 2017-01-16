<?php

namespace Aesonus\Darts\Contracts;

/**
 * Description of DartInterface
 *
 * @author cory
 */
interface DartInterface
{

    /**
     * 
     * @return DartScoreInterface 
     */
    public function score();
    
    /**
     * 
     * @return PanelInterface 
     */
    public function panel();
    
    /**
     * 
     * @return ZoneInterface 
     */
    public function zone();

    /**
     * 
     * @param int $panel A panel 0 thru 20
     * @return $this 
     */
    public function setPanel(PanelInterface $panel);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\ModifierInterface $modifier
     * @return $this
     */
    public function setZone(ZoneInterface $zone);

    /**
     * 
     * @return int A panel 0 thru 20
     */
    public function getPanel();

    /**
     * 
     * @return ModifierInterface 
     */
    public function getZone();
}
