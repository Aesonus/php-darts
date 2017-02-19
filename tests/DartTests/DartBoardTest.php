<?php
use Aesonus\Darts as D;
use Aesonus\Darts\Dart;
use \Aesonus\Darts\Contracts;
use Interop\Container\ContainerInterface;

/**
 * Description of DartBoardTest
 *
 * @author cory
 */
class DartBoardTest extends PHPUnit\Framework\TestCase
{

    /**
     *
     * @var ContainerInterface 
     */
    private $container;

    /**
     *
     * @var D\DartBoard; 
     */
    protected $dartBoard;

    public function setUp()
    {
        //Load the container
        $builder = new DI\ContainerBuilder();
        $builder->addDefinitions([
            Contracts\ColorInterface::class => DI\object(D\Color::class)->
                scope(\DI\Scope::PROTOTYPE),
            Contracts\PanelInterface::class => DI\object(D\Panel::class)->
                scope(\DI\Scope::PROTOTYPE),
            Contracts\DartInterface::class => DI\object(Dart::class)->
                scope(\DI\Scope::PROTOTYPE),
            Contracts\ZoneInterface::class => DI\object(D\Zone::class)->
                scope(\DI\Scope::PROTOTYPE),
            Contracts\DartBoardInterface::class => \DI\object(D\DartBoard::class),
            'dart' => \DI\get(Contracts\DartInterface::class),
        ]);
        $this->container = $builder->build();
        $this->dartBoard = $this->container->get(Contracts\DartBoardInterface::class);
    }

    /**
     * @dataProvider verticalPaneDataProvider
     */
    public function testVerticalPane($panel, $expected)
    {
        $this->assertEquals($expected, $this->dartBoard->verticalPanel($this->container->get(Contracts\PanelInterface::class)->set($panel)));
    }

    public function verticalPaneDataProvider()
    {
        return [
            [0, null], [1, 19], [2, 12], [3, 20], [4, 16], [5, 17], [6, 11],
            [7, 18], [8, 13], [9, 15], [10, 14], [11, 6], [12, 2], [13, 8],
            [14, 10], [15, 9], [16, 4], [17, 5], [18, 7], [19, 1], [20, 3],
            [21, null]
        ];
    }
}
