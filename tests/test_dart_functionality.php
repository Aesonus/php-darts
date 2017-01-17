<?php
ini_set('display_errors', 'on');

use Aesonus\Darts;
use Aesonus\Darts\Dart;

//Autoloading
require __DIR__ . '/../vendor/autoload.php';

//Configure the library
Darts\Config::colorClass(Darts\Color::class);

//Test the dart class
$dart = new Dart((new Darts\Panel())->set(5), new Darts\Zones\Double());

dump($dart);