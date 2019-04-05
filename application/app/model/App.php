<?php

namespace App\Model;

use App\Model\Concrete\AbstractModel;

class App extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        echo 'Factory working';
    }
}