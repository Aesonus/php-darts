<?php

namespace Aesonus\Darts;

/**
 * Description of Panel
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Panel implements Contracts\PanelInterface
{

    /**
     *
     * @var Contracts\DartBoardInterface 
     */
    protected $dartBoard;

    /**
     * A number to represent the panel
     * @var int 
     */
    protected $panel = 0;

    public function __construct(Contracts\DartBoardInterface $dartboard)
    {
        $this->dartBoard = $dartboard;
    }

    public function get()
    {
        return $this->panel;
    }

    public function set($panel)
    {
        if (is_int($panel) && $panel >= 0 && $panel <= static::BULLSEYE) {
            $this->panel = $panel;
        } else {
            throw new Exceptions\InvalidPanelException('$panel must be an integer 0 - '
            . static::BULLSEYE);
        }
        return $this;
    }
}
