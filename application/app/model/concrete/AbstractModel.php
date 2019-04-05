<?php

namespace App\Model\Concrete;

use Core\Database\Connection;

abstract class AbstractModel
{
    /** @var null|Connection */
    private $_connection = null;

    /**
     * AbstractModel constructor.
     */
    public function __construct()
    {
        $this->_initConnection();
    }

    /**
     * Initialize a connection for this model
     */
    private function _initConnection()
    {
        $this->_connection = Connection::getInstance()
            ->connect();
    }
}