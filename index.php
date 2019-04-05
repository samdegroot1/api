<?php

use Core\Model\CoreModel;

include_once 'Autoloader.php';

$autoloader = new Autoloader();
$autoloader->register();
$autoloader->addNamespace('App', __DIR__ . '/application/app');
$autoloader->addNamespace('Core', __DIR__ . '/application/core');


$app = CoreModel::factory('App')
    ->test();
