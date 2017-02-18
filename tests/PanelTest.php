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
class PanelTest extends PHPUnit\Framework\TestCase
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
            $panel[] = [$i,$i];
        }
        return $panel;
    }
    
    /**
     * @dataProvider panelDataProvider
     */
    public function testPanel($expected,$panel)
    {
        $this->panel->set($panel);
        $this->assertEquals($expected, $this->panel->get());
    }
    
}
