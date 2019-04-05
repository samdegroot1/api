<?php


require_once 'Autoloader.php';

$autoloader = new Autoloader();
$autoloader->register();
$autoloader->addNamespace('Core', __DIR__ . '/framework/core');
$autoloader->addNamespace('App', __DIR__ . '/application');
$autoloader->addNamespace('Util', __DIR__ . '/framework/util');


$app = \Core\Model\ModelFactory::getInstance('App')
    ->test();

$data = [];
\Util\ArrayUtils::keepKeys($data, $data);
