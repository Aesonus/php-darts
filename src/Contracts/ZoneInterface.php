<?php

namespace Aesonus\Darts\Contracts;

use Aesonus\Darts\Exceptions\DartNotThrownException;
use Aesonus\Darts\Exceptions\InvalidZoneException;

/**
 *
 * @author cory
 */
interface ZoneInterface
{

    /**
     * @var array zone names and callable
     */
    const ZONES = [
        'miss',
        'double',
        'outerSingle',
        'triple',
        'innerSingle',
        'outerBullseye',
        'innerBullseye'
    ];

    /**
     * Returns a modified dart score
     * @param \Aesonus\Darts\Contracts\DartInterface $dart
     * @return int The dart's score after the modifier
     */
    public function modify(DartInterface $dart);

    /**
     * 
     * @param string $zone zone identifier
     * @return $this 
     * @throws InvalidZoneException
     */
    public function set($zone);

    /**
     * 
     * @return string zone identifier
     */
    public function get();

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function miss(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function double(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function outerSingle(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function triple(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function innerSingle(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function outerBullseye(DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotThrownException
     */
    public function innerBullseye(DartInterface $dart);
}
