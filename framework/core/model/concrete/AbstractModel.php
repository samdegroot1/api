<?php

namespace Core\Model\Concrete;

use PDO;
use PDOException;

abstract class AbstractModel
{
    private $connection;

   public function __construct()
    {

    }

    protected function setupConnection()
    {
        try {
            $this->connection = new PDO(
                sprintf('mysql:host=%s;dbname=%s;',
                    getenv('DB_HOST'),
                    getenv('DB_NAME')
                ),
                getenv('DB_USER'),
                getenv('DB_PASS'),
                array(
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                )
            );
        }
        catch (PDOException $e) {
            throw $e;
        }
    }

    public function getConnection()
    {
        if(! isset($this->connection)) {
            $this->setupConnection();
        }

        return $this->connection;
    }
}