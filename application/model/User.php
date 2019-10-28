<?php

namespace App\Model;

use App\Model\Concrete\AbstractModel;

class User extends AbstractModel
{
    protected $tableName = 'user';
    
    public function __construct()
    {
        parent::__construct();
    }
}