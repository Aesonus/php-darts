<?php
use Aesonus\Darts as D;
use Aesonus\Darts\Dart;
use \Aesonus\Darts\Contracts;
use Interop\Container\ContainerInterface;

/**
 * PHPUnit Testing Class
 *
 * @author cory
 */
class DartTest extends \PHPUnit\Framework\TestCase
{

    /**
     *
     * @var array 
     */
    private $zones = [
        D\Zone::MISS,
        D\Zone::DOUBLE,
        D\Zone::OUTER_SINGLE,
        D\Zone::TRIPLE,
        D\Zone::INNER_SINGLE,
        D\Zone::OUTER_BULLSEYE,
        D\Zone::INNER_BULLSEYE
    ];

    /**
     *
     * @var ContainerInterface 
     */
    private $container;

    /**
     *
     * @var D\Dart; 
     */
    protected $dart;

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

        /**
         * 
         * @var ContainerInterface Use any container you wish
         */
        $this->container = $builder->build();
        $this->dart = $this->container->get('dart');
    }

    public function testDartGetterMethods()
    {
        $this->assertInstanceOf(D\Panel::class, $this->dart->panel());
        $this->assertInstanceOf(D\Zone::class, $this->dart->zone());
    }

    public function testDartThrowsNotThrownExceptionWhenNotSet()
    {
        $this->expectException(D\Exceptions\DartNotThrownException::class);
        //The dart hasn't been set yet
        $this->dart->score();
    }

    /**
     * @dataProvider dartDataProvider
     */
    public function testDart($panel, $zone, $expected, $expectedColor)
    {
        $this->dart->set($panel, $zone);
        $this->assertEquals($expected, $this->dart->score());
        $this->assertEquals($expectedColor, $this->dart->color()->get());
        $this->assertEquals(TRUE, $this->dart->isThrown());
        $this->assertEquals($panel === 0 || $zone === 'miss',$this->dart->missed());
    }
    
    public function dartDataProvider()
    {
        //Test covers these cases :)
        foreach ($this->zones as $zone) {
            for ($panel = 0; $panel < 22; $panel++) {
                switch ($zone) {
                    case D\Zone::MISS:
                        $expected = 0;
                        $expectedColor = null;
                        break;
                    case D\Zone::OUTER_SINGLE:
                    case D\Zone::INNER_SINGLE:
                        $expected = $panel;
                        $expectedColor = in_array($panel, [1,4,6,15,17,19,16,11,9,5]) ? D\Color::WHITE : D\Color::BLACK;
                        $expectedColor = $panel == D\Panel::BULLSEYE || $panel == D\Panel::MISS ? null : $expectedColor;
                        break;
                    case D\Zone::DOUBLE:
                        $expected = $panel * 2;
                        $expectedColor = in_array($panel, [1,4,6,15,17,19,16,11,9,5]) ? D\Color::GREEN : D\Color::RED;
                        $expectedColor = $panel == D\Panel::BULLSEYE || $panel == D\Panel::MISS ? null : $expectedColor;
                        break;
                    case D\Zone::TRIPLE:
                        $expected = $panel * 3;
                        $expectedColor = in_array($panel, [1,4,6,15,17,19,16,11,9,5]) ? D\Color::GREEN : D\Color::RED;
                        $expectedColor = $panel == D\Panel::BULLSEYE || $panel == D\Panel::MISS ? null : $expectedColor;
                        break;
                    case D\Zone::OUTER_BULLSEYE:
                        $expected = 25;
                        $expectedColor = D\Color::GREEN;
                        break;
                    case D\Zone::INNER_BULLSEYE:
                        $expected = 50;
                        $expectedColor = D\Color::RED;
                        break;
                }
                //$expectedColor = $panel == 0 ? null : $expectedColor;
                $ret[] = [$panel, $zone, $expected, $expectedColor];
            }
        }
        return $ret;
    }

    private function marray($countto, $startfrom = 0)
    {
        for ($i = $startfrom; $i < $countto; $i++) {
            $ret[] = $i;
        }
        return $ret;
    }

    private function mrepeatarray($val, $elements)
    {
        for ($i = 0; $i < $elements; $i ++) {
            $ret[] = $val;
        }
        return $ret;
    }
}
