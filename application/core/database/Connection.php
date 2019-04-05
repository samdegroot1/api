<?php

namespace Core\Database;

class Connection
{
    private static $_instance = null;

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
        if(!isset(self::$_instance) || $forceNew) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * @return bool
     */
    public function connect()
    {
        return true;
    }
}