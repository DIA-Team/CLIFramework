<?php

use CLIFramework\ServiceContainer;

$loader = require 'vendor/autoload.php';
$loader->add('TestApp', 'tests');
$loader->add('DemoApp', 'tests');
$container = ServiceContainer::getInstance();
// $container['logger']->setQuiet();
