<?php

namespace Core\Database;

class Table
{
    protected $tableName;

    private $adapter;

    public function __construct()
    {
        $this->adapter = Adapter::getInstance();
    }

    public function getAdapter() : Adapter
    {
        return $this->adapter;
    }

    public function getTableName()
    {
        return $this->tableName;
    }
}