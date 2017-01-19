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
    Contracts\ColorInterface::class => DI\object(Darts\Color::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\PanelInterface::class => DI\object(Darts\Panel::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\DartInterface::class => DI\object(Dart::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\ZoneInterface::class => DI\object(Darts\Zone::class)->
        scope(\DI\Scope::PROTOTYPE),
        Contracts\DartBoardInterface::class => \DI\object(Darts\DartBoard::class),
    'dart' => \DI\get(Contracts\DartInterface::class),
]);

/**
 * 
 * @var ContainerInterface Use any container you wish
 */
$container = $builder->build();

//Test the dart class

try {
    echo 'Should generate a ' . Darts\Exceptions\DartNotThrownException::class;
    $dart = $container->get('dart');
    $dart->panel()->set(21);
    //$dart->zone()->set(Darts\Zone::INNER_BULLSEYE);
    dump($dart->color());
    dump($dart);
} catch (\Exception $e) {
    dump($e);
}

try {
    echo 'Dart should have a color of red';
    $dart = $container->get('dart');
    $dart->panel()->set(21);
    $dart->zone()->set(Darts\Zone::INNER_BULLSEYE);
    $dart->color();
    dump($dart);
} catch (\Exception $exc) {
    dump($exc);
}

try {
    echo 'Dart should have a color of white';
    $dart = $container->get('dart');
    $dart->panel()->set(1);
    $dart->zone()->set(Darts\Zone::INNER_SINGLE);
    dump($dart->color());
    dump($dart);
} catch (\Exception $exc) {
    dump($exc);
}

try {
    
    $dart = $container->get('dart');
    $dart->panel()->set(0);
    $dart->zone()->set(Darts\Zone::DOUBLE);
    echo "Did the dart miss? It should";
    dump($dart->missed());
    echo 'Dart should generate a '. Darts\Exceptions\InvalidColorException::class;
    dump($dart->color());
    dump($dart);
} catch (\Exception $exc) {
    dump($exc);
}

try {
    $dart = $container->get('dart');
    echo 'Dart should generate a '. Darts\Exceptions\InvalidPanelException::class;
    $dart->panel()->set(22);
    $dart->zone()->set(Darts\Zone::DOUBLE);
} catch (\Exception $exc) {
    dump ($exc instanceof Darts\Exceptions\InvalidPanelException);
    dump($exc);
}