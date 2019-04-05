<?php

use Core\Model\App;
use Core\Model\ModelFactory;
use Dotenv\Dotenv;
use Util\ArrayUtils;

require_once 'Autoloader.php';
require_once 'framework/lib/autoload.php';

Autoloader::getInstance()
    ->addNamespace('Core', __DIR__ . '/framework/core')
    ->addNamespace('App', __DIR__ . '/application')
    ->addNamespace('Util', __DIR__ . '/framework/util');

Dotenv::create(__DIR__)
    ->load();

App::getInstance()
    ->run();