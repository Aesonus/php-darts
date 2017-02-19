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
     * @var D\Zone; 
     */
    protected $zone;
    protected $zones = [
        'miss',
        'double',
        'outerSingle',
        'triple',
        'innerSingle',
        'outerBullseye',
        'innerBullseye'
    ];

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
        $this->zone = $this->container->get(Contracts\ZoneInterface::class);
    }

    public function testZoneConstants()
    {
        $this->assertEquals('innerSingle', D\Zone::INNER_SINGLE);
        $this->assertEquals('outerSingle', D\Zone::OUTER_SINGLE);
        $this->assertEquals('double', D\Zone::DOUBLE);
        $this->assertEquals('triple', D\Zone::TRIPLE);
        $this->assertEquals('innerBullseye', D\Zone::INNER_BULLSEYE);
        $this->assertEquals('outerBullseye', D\Zone::OUTER_BULLSEYE);
        $this->assertEquals('miss', D\Zone::MISS);
    }

    public function zoneTestDataProvider()
    {
        return [
            ['innerSingle', D\Zone::INNER_SINGLE],
            ['outerSingle', D\Zone::OUTER_SINGLE],
            ['double', D\Zone::DOUBLE],
            ['triple', D\Zone::TRIPLE],
            ['innerBullseye', D\Zone::INNER_BULLSEYE],
            ['outerBullseye', D\Zone::OUTER_BULLSEYE],
            ['miss', D\Zone::MISS],
        ];
    }

    /**
     * @dataProvider zoneTestDataProvider
     */
    public function testZoneSetAndGet($expected, $zone)
    {
        $this->assertEquals($this->zone, $this->zone->set($zone));
        $this->assertEquals($expected, $this->zone->get());
    }

    /**
     * @dataProvider invalidZoneDataProvider
     */
    public function testInvalidZone($zone)
    {
        $this->expectException(D\Exceptions\InvalidZoneException::class);
        $this->zone->set($zone);
    }

    public function invalidZoneDataProvider()
    {
        return [
            'string' => ['blah'],
            'int' => [0],
            'array' => [[0, 2, 3]],
            'object' => [new stdClass()]
        ];
    }
}
