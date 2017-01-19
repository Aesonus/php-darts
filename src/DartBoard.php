<?php

namespace Aesonus\Darts;

use Aesonus\Darts\Color;

/**
 * Represents the dart board. Should be a singleton.
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class DartBoard implements Contracts\DartBoardInterface
{

    /**
     * The panel directly across from another
     * @var array The panel directly across from another. Misses and bullseyes do not have a vertical panel
     */
    const VERTICAL_PANEL = [null, 19, 12, 20, 16, 17, 11, 18, 13, 15, 14, 6, 2, 8, 10, 9, 4, 5, 7, 1, 3, null];
    const DART_COLORS = [
        'single' => [
            null,Color::WHITE, Color::BLACK, Color::BLACK,
            Color::WHITE, Color::WHITE, Color::WHITE,
            Color::BLACK, Color::BLACK, Color::WHITE,
            Color::BLACK, Color::WHITE, Color::BLACK,
            Color::BLACK, Color::BLACK, Color::WHITE,
            Color::WHITE, Color::WHITE, Color::BLACK,
            Color::WHITE, Color::BLACK
        ],
        'double|triple' => [
            null,Color::GREEN, Color::RED, Color::RED,
            Color::GREEN, Color::GREEN, Color::GREEN,
            Color::RED, Color::RED, Color::GREEN,
            Color::RED, Color::GREEN, Color::RED,
            Color::RED, Color::RED, Color::GREEN,
            Color::GREEN, Color::GREEN, Color::RED,
            Color::GREEN, Color::RED
        ],
        'bullseye' => [
            'inner' => Color::RED,
            'outer' => Color::GREEN,
        ]
    ];

    public function verticalPanel(Contracts\PanelInterface $panel)
    {
        return static::VERTICAL_PANEL[$panel->get()];
    }

    public function getColor(Contracts\DartInterface $dart)
    {
        $panel = $dart->panel()->get();
        $zone = $dart->zone()->get();
        foreach (static::DART_COLORS as $pattern => $colors) {
            if (preg_match("/$pattern/i", $zone) > 0) {
                return $panel != Panel::BULLSEYE ? $colors[$panel] : $colors[strtolower(mb_substr($zone, 0, 5))];
            }
        }
    }
}
