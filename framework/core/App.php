<?php

namespace Core;

use Core\Model\ModelFactory;

class App
{
    private static $_instance = null;

    /**
     * private App constructor.
     */
    private function __construct()
    {

    }

    /**
     * @return App|null
     */
    public static function getInstance()
    {
        if(!isset(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Start application for the first time.
     * Initialize database connection and save metadata caches. Start routing/bootstrapping.
     */
    public function run()
    {
        print_r(ModelFactory::get('TestModel'));
    }
}