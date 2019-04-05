<?php

use Core\Model\ModelFactory;
use Util\ArrayUtils;

require_once 'Autoloader.php';

Autoloader::getInstance()
    ->addNamespace('Core', __DIR__ . '/framework/core')
    ->addNamespace('App', __DIR__ . '/application')
    ->addNamespace('Util', __DIR__ . '/framework/util');


$app = ModelFactory::get('App')
    ->test();

$data = [];
ArrayUtils::keepKeys($data, $data);
