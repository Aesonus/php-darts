<?php
ini_set('display_errors', 'on');
use Aesonus\Darts;
use Aesonus\Darts\Dart;
use Aesonus\Darts\Contracts;
use Interop\Container\ContainerInterface;

//Autoloading
require __DIR__ . '/../vendor/autoload.php';

//Load the container
$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    Contracts\PanelColorInterface::class => DI\object(Darts\Color::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\PanelInterface::class => DI\object(Darts\Panel::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\DartInterface::class => DI\object(Dart::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\ZoneInterface::class => DI\object(Darts\Zone::class)->
        scope(\DI\Scope::PROTOTYPE),
    'dart' => \DI\get(Contracts\DartInterface::class),
]);

/**
 * 
 * @var ContainerInterface Use any container you wish
 */
$container = $builder->build();

//Test the dart class

/**
 * 
 * @var Darts\Dart
 */
$dart = $container->get('dart');

$dart->panel()->set(5);
$dart->zone()->set('double');

dump($dart);
dump($dart->score());
