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
class ColorTest extends PHPUnit\Framework\TestCase
{

    /**
     *
     * @var ContainerInterface 
     */
    private $container;

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
    }

    /**
     * @dataProvider colorConstantsDataProvider
     */
    public function testColorConstants($expected, $color)
    {
        $this->assertEquals($expected, $color);
    }

    public function colorConstantsDataProvider()
    {
        return [
            ['black', D\Color::BLACK],
            ['white', D\Color::WHITE],
            ['red', D\Color::RED],
            ['green', D\Color::GREEN]
        ];
    }
}
