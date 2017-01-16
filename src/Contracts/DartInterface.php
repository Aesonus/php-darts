<?php

namespace Aesonus\Darts\Contracts;

/**
 * Description of DartInterface
 *
 * @author cory
 */
interface DartInterface
{
    public function __construct(PanelInterface $panel = null, ZoneInterface $zone = null);

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
}
