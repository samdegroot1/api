<?php

namespace App\Model;

use App\Model\Concrete\AbstractModel;

class TestModel extends AbstractModel
{

    public $test = 1;

    public function __construct()
    {

    }

    public function test()
    {
        echo 'Factory working';
    }
}