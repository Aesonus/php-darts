<?php

namespace Aesonus\Darts\Contracts;

use Aesonus\Darts\Exceptions\DartNotInitializedException;

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
     * @throws DartNotInitializedException
     */
    public function miss(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function double(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function outerSingle(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function triple(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function innerSingle(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function outerBullseye(Contracts\DartInterface $dart);

    /**
     * 
     * @param \Aesonus\Darts\Contracts\Contracts\DartInterface $dart
     * @return int Dart score after modification
     * @throws DartNotInitializedException
     */
    public function innerBullseye(Contracts\DartInterface $dart);
}
