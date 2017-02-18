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
class ZoneTest extends PHPUnit\Framework\TestCase
{

    /**
     *
     * @var ContainerInterface 
     */
    private $container;

    /**
     *
     * @var D\Panel; 
     */
    protected $panel;

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
        $this->panel = $this->container->get(Contracts\PanelInterface::class);
    }

    public function panelDataProvider()
    {
        for ($i = 0; $i < 22; $i ++) {
            $panel[] = [$i, $i];
        }
        return $panel;
    }

    /**
     * @dataProvider panelDataProvider
     */
    public function testPanelSetAndGet($expected, $panel)
    {

        $this->assertEquals($this->panel, $this->panel->set($panel));
        $this->assertEquals($expected, $this->panel->get());
    }

    public function panelExceptionDataProvider()
    {
        for ($i = -99; $i < 0; $i ++) {
            $panel[] = [$i, $i];
        }
        for ($i = 22; $i < 100; $i ++) {
            $panel[] = [$i, $i];
        }
        $panel = array_merge($panel, [
            'string' => ['string'],
            'object' => [new stdClass()],
            'array' => [[0, 1, 2]]
        ]);
        return $panel;
    }

    /**
     * @dataProvider panelExceptionDataProvider
     */
    public function testInvalidPanelException($panel)
    {
        $this->expectException(D\Exceptions\InvalidPanelException::class);
        $this->panel->set($panel);
    }

    public function testPanelConstants()
    {
        $this->assertEquals(0, Contracts\PanelInterface::MISS);
        $this->assertEquals(21, Contracts\PanelInterface::BULLSEYE);
    }
}
