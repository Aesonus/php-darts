<?php
ini_set('display_errors', 'on');
use Aesonus\Darts;
use Aesonus\Darts\Dart;
use Aesonus\Darts\Contracts;

//Autoloading
require __DIR__ . '/../vendor/autoload.php';

//Load the container
$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    Contracts\PanelColorInterface::class => DI\object(Darts\Color::class)->
        scope(\DI\Scope::PROTOTYPE),
    Contracts\PanelInterface::class => DI\object(Darts\Panel::class)->
        scope(\DI\Scope::PROTOTYPE)
]);
$container = $builder->build();

//Test the dart class
$dart = new Dart($container->get(Contracts\PanelInterface::class), new Darts\Zones\SingleInner());

dump($dart);
dump($dart->score());