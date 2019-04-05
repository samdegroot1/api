<?php

use Core\Model\ModelFactory;
use Framework\Util\ArrayUtils;

require_once 'Autoloader.php';

Autoloader::getInstance()
    ->addNamespace()
    ->addNamespace('Core', __DIR__ . '/framework/core')
    ->addNamespace('App', __DIR__ . '/application')
    ->addNamespace('Util', __DIR__ . '/framework/util');


$app = ModelFactory::getInstance('App')
    ->test();

$data = [];
ArrayUtils::keepKeys($data, $data);
