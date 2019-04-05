<?php


include_once 'Autoloader.php';

$autoloader = new Autoloader();
$autoloader->register();
$autoloader->addNamespace('Application', __DIR__ . '/application');


$app = new \Application\Model\App();
$app->run();
