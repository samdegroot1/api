<?php

namespace Core\Model\Concrete;

abstract class AbstractModel
{
    private $connection;

   public function __construct()
    {
        $this->setupConnection();
    }

    protected function setupConnection()
    {
        try {
            $this->connection = new \PDO(
                sprintf('mysql:host=%s;dbname=%s;',
                    getenv('DB_HOST'),
                    getenv('DB_NAME')
                ),
                getenv('DB_USER'),
                getenv('DB_PASS')
            );
        }
        catch (\PDOException $e) {
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