<?php

/**
 * Description of Tests
 *
 * @author cory
 */
abstract class Tests extends PHPUnit\Framework\TestCase
{
        
    /**
     *
     * @var ContainerInterface 
     */
    protected $container;
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
}
