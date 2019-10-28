<?php

namespace Core;

use Core\Model\ModelFactory;

class App
{
    private static $instance = null;

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
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Start application for the first time.
     * Initialize database connection and save metadata caches. Start routing/bootstrapping.
     */
    public function run()
    {
        $data = ModelFactory::get('User')
            ->getAdapter()
            ->fetchAll('select * from user where id = :id', [
                'id' => 1
            ]);

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}