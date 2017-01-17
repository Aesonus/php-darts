<?php

namespace Aesonus\Darts\Contracts;
use Aesonus\Darts\Exceptions\DartNotInitializedException;

/**
 * Description of DartInterface
 *
 * @author cory
 */
interface DartInterface
{

    public function __construct(PanelInterface $panel, ZoneInterface $zone);
    /**
     * 
     * @throws DartNotInitializedException
     * @return int 
     */
    public function score();

    /**
     * 
     * @throws DartNotInitializedException
     * @return PanelInterface 
     */
    public function panel();

    /**
     * 
     * @throws DartNotInitializedException
     * @return ZoneInterface 
     */
    public function zone();
}
