<?php

namespace Core\Database;

use Exception;
use PDO;
use PDOException;
use PDOStatement;

class Adapter
{
    private static $instance = null;

    private $connection;
    private $stmt;

    /**
     * Adapter constructor.
     */
    private function __construct()
    {

    }

    public function __destruct()
    {
        $this->connection = null;
        $this->stmt = null;
    }

    /**
     * @param $forceNew
     *
     * @return Adapter|null
     */
    public static function getInstance(bool $forceNew = false) : Adapter
    {
        if(!isset(self::$instance) || $forceNew) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() : PDO
    {
        if(! isset($this->connection)) {
            $this->initConnection();
        }

        return $this->connection;
    }

    public function fetch(string $sql, array $conds)
    {
        try {
            return $this->execute($sql, $conds)
                ->fetch();
        }
        catch (Exception $e) {
            $this->stmt = null;
            throw $e;
        }
    }


    public function fetchAll(string $sql, array $conds)
    {
        try {
            return $this->execute($sql, $conds)
                ->fetchAll();
        }
        catch (Exception $e) {
            $this->stmt = null;
            throw $e;
        }
    }

    private function initConnection() : void
    {
        if(! $this->connection) {
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
    }

    private function execute(string $sql, array $conds)
    {
        $this->getStmt($sql)
            ->execute($conds);

        return $this->getStmt();
    }

    private function getStmt(string $sql = null) : PDOStatement
    {
        if($sql) {
            $this->stmt = $this->getConnection()
                ->prepare($sql);
        }

        return $this->stmt;
    }
}