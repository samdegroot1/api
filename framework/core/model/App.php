<?php

namespace Core\Model;

use Core\Model\Concrete\AbstractModel;

class App extends AbstractModel
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
     * Initialize database connection and save metadata caches.
     */
    public function run()
    {

    }
}