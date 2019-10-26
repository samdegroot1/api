<?php

namespace Core\Database;

class Connection
{
    private static $instance = null;

    /**
     * Connection constructor.
     */
    private function __construct()
    {

    }

    /**
     * @param $forceNew
     *
     * @return Connection|null
     */
    public static function getInstance($forceNew = false)
    {
        if(!isset(self::$instance) || $forceNew) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return bool
     */
    public function connect()
    {
        return true;
    }
}